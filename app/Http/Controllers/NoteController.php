<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $model;

    public function __construct() {
        $this->model = new Note();
    }

    public function index(Request $request, $id = 0) {
        $category_model = new Category();
        $data = array();
        if ($id != 0) {
            $note = $this->model->getNoteWithId($request->session()->get('user')->email, $id);
            if ($note) {
                $data['note'] = $note;
            } else {
                return redirect("/")->with("message", "You don't have the right to see this note or the note does not exist.");
            }
        }
        $category = $category_model->getCategories();
        $data['categories'] = $category;
        return view('pages.note', $data);
    }

    public function editNote(NoteRequest $request) {
        $category = $request->input("note_category");
        $title = $request->input("note_title");
        $text = $request->input("note_text");
        $id = $request->input("note_id");
        $note = $this->model->getNoteWithId($request->session()->get('user')->email, $id);
        if (!$note) {
            return redirect("/")->with("message", "You don't have the right to edit this note or the note does not exist.");
        }
        $this->model->editNote($id, $title, $text, $category);
        return $this->index($request, $id);
    }

    public function addNote(NoteRequest $request) {
        $title = $request->input("note_title");
        $text = $request->input("note_text");
        $category = $request->input("note_category");
        $lastInsertId = $this->model->insertNote($title, $text, $category, $request->session()->get('user')->id);
        return $this->index($request, $lastInsertId);
    }

    public function deleteNote(Request $request, $id = 0) {
        if ($id != 0) {
            $note = $this->model->getNoteWithId($request->session()->get('user')->email, $id);
            if ($note) {
                $this->model->deleteNote($id);
                return redirect("/");
            } else {
                return redirect("/")->with("message", "You don't have the right to delete this note or the note does not exist.");
            }
        } else {
            return redirect("/")->with("message", "Note must exist.");
        }
    }
}
