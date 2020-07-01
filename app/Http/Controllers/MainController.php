<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNotesRequest;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $model;
    protected $category_model;

    public function __construct() {
        $this->model = new Note();
        $this->category_model = new Category();
    }

    public function main(Request $request) {
        $db_data = $this->model->getNoteCount($request->session()->get('user')->email);
        $cat_data = $this->category_model->getCategories();
        $data = array();
        $data['note_count'] = $db_data;
        $data['categories'] = $cat_data;
        return view('pages.main', $data);
    }

    public function getNotes(GetNotesRequest $request) {
        $category = $request->input("category");
        $title = $request->input("title");
        $email = $request->session()->get('user')->email;
        if ($category == 0 && $title == null) {
            $notes = $this->model->getNotes($email);
        } else if ($title == null) {
            $notes = $this->model->getNotesWithCategory($category, $email);
        } else if ($category == 0) {
            $notes = $this->model->getNotesWithTitle($title, $email);
        } else {
            $notes = $this->model->getNotesWithCategoryAndTitle($category, $title, $email);
        }
        return $notes;

    }

}
