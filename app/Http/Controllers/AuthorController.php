<?php

namespace App\Http\Controllers;

use App\Models\AuthorImage;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new AuthorImage();
    }

    public function index() {
        return view('pages.author');
    }

    public function getImages() {
        return $this->model->getAll();
    }
}
