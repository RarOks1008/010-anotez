<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorEditImageRequest;
use App\Http\Requests\AuthorImageRequest;
use App\Models\AuthorImage;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new AuthorImage();
    }

    public function showAuthor(Request $request) {
        $data = [];
        $data['author_images'] = $this->model->getAll();
        return view('admin.admin_show_author', $data);
    }

    public function addAuthor(Request $request) {
        return view('admin.admin_add_author');
    }

    public function adminAddAuthor(AuthorImageRequest $request) {
        \DB::beginTransaction();
        $image = $request->file("authorimage");
        $name = time()."_".$image->getClientOriginalName();
        $isUploaded = $image->move(public_path()."/img/author", $name);
        if (!$isUploaded) {
            \DB::rollback();
            return redirect("admin/show_author");
        }
        $name_full = "/img/author/".$name;
        $is_author = $request->input("isauthor");
        $author = $is_author == "true" ? 1 : 0;
        try {
            $lastId = $this->model->addAuthorImage($name_full, $author);
            if (!$lastId) {
                \DB::rollback();
                return redirect("admin/show_author");
            }
        } catch (\Exception $ex) {
            \DB::rollback();
            return redirect("admin/show_author");
        }
        \DB::commit();
        return redirect("admin/show_author");
    }

    public function editAuthor(Request $request, $id = 0) {
        $data = [];
        $data['image'] = $this->model->getImageWithId($id);
        if ($data['image']) {
            return view('admin.admin_edit_author', $data);
        }
        return redirect("admin/show_author")->with("message", "You don't have the right to see this image or the image does not exist.");
    }

    public function adminEditAuthor(AuthorEditImageRequest $request) {
        $is_author = $request->input("isauthor");
        $author = $is_author == "true" ? 1 : 0;
        $lastImageUrl = $request->input("lastImageUrl");
        $id = $request->input("id");
        $image = $request->file("authorimage");
        if ($image) {
            \DB::beginTransaction();
            $name = time()."_".$image->getClientOriginalName();
            $isUploaded = $image->move(public_path()."/img/author", $name);
            if (!$isUploaded) {
                \DB::rollback();
                return redirect("admin/show_author");
            }
            $name_full = "/img/author/".$name;
            if(\File::exists(public_path().$lastImageUrl)) {
                \File::delete(public_path().$lastImageUrl);
            }
            try {
                $this->model->editWithAuthorImage($name_full, $author, $id);
                \DB::commit();
            } catch (\Exception $ex) {
                \DB::rollback();
                return redirect("admin/show_author");
            }
        } else {
            $this->model->editIsAuthor($author, $id);
        }
        return redirect("admin/show_author");
    }

    public function deleteAuthor(Request $request, $id = 0) {
        $image = $this->model->getImageWithId($id);
        if ($image) {
            if(\File::exists(public_path().$image->author_image)) {
                \File::delete(public_path().$image->author_image);
                $this->model->deleteAuthorImage($id);
            }
            return redirect("admin/show_author");
        }
        return redirect("admin/show_author")->with("message", "You don't have the right to see this image or the image does not exist.");
    }
}
