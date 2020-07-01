<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new Category();
    }

    public function showCategory(Request $request) {
        $data = [];
        $data['categories'] = $this->model->getCategories();
        return view('admin.admin_show_categories', $data);
    }

    public function addCategory(Request $request) {
        return view('admin.admin_add_category');
    }

    public function adminAddCategory(AddCategoryRequest $request) {
        $name = $request->input("categoryname");
        $color = $request->input("categorycolor");
        $this->model->insertCategory($name, $color);
        return redirect("/admin/show_category");
    }

    public function editCategory(Request $request, $id = 0) {
        $data = [];
        $data['category'] = $this->model->getCategoryWithId($id);
        if ($data['category']) {
            return view('admin.admin_edit_category', $data);
        }
        return redirect("admin/show_category")->with("message", "You don't have the right to see this category or the category does not exist.");
    }

    public function adminEditCategory(AddCategoryRequest $request) {
        $name = $request->input("categoryname");
        $color = $request->input("categorycolor");
        $id = $request->input("id");
        $this->model->editCategory($name, $color, $id);
        return redirect("/admin/show_category");
    }

    public function deleteCategory(Request $request, $id = 0) {
        $category = $this->model->getCategoryWithId($id);
        if ($category) {
            $this->model->deleteCategory($id);
            return redirect("admin/show_category");
        }
        return redirect("admin/show_category")->with("message", "You don't have the right to see this category or the category does not exist.");
    }
}
