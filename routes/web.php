<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'MainController@main')->middleware('loggedIn');
Route::get('/get_notes', 'MainController@getNotes')->middleware('loggedIn');

Route::post('/login', 'LoginController@loginDo');
Route::get('/login', 'LoginController@login')->middleware('loggedIn');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@register')->middleware('loggedIn');
Route::post('/register', 'RegisterController@registerDo');

Route::get('/note/{id?}', 'NoteController@index')->middleware('loggedIn')->where(["id"=> "\d+"]);
Route::post('/editnote', 'NoteController@editNote')->middleware('loggedIn');
Route::post('/addnote', 'NoteController@addNote')->middleware('loggedIn');
Route::get('/deletenote/{id?}', 'NoteController@deleteNote')->middleware('loggedIn')->where(["id"=> "\d+"]);

Route::get('/author', 'AuthorController@index')->middleware('loggedIn');
Route::get('/author_get_images', 'AuthorController@getImages')->middleware('loggedIn');

Route::get('/contact', 'ContactController@index')->middleware('loggedIn');
Route::post('/contact_us', 'ContactController@contactUs')->middleware('loggedIn');

Route::prefix("/admin")->middleware(["loggedIn", "isAdmin"])-> group(function(){
    Route::get("/", 'AdminUserController@showUsers');

    Route::get("/show_users", 'AdminUserController@showUsers');
    Route::get("/add_user", 'AdminUserController@addUser');
    Route::post("/add_user", 'AdminUserController@adminAddUser')->middleware('logAdminVisit');
    Route::get('/edit_user/{id?}', 'AdminUserController@editUser')->where(["id"=> "\d+"]);
    Route::post('/edit_user', 'AdminUserController@adminEditUser')->middleware('logAdminVisit');
    Route::get('/delete_user/{id?}', 'AdminUserController@deleteUser')->where(["id"=> "\d+"])->middleware('logAdminVisit');

    Route::get("/show_category", 'AdminCategoryController@showCategory');
    Route::get("/add_category", 'AdminCategoryController@addCategory');
    Route::post("/add_category", 'AdminCategoryController@adminAddCategory')->middleware('logAdminVisit');
    Route::get('/edit_category/{id?}', 'AdminCategoryController@editCategory')->where(["id"=> "\d+"]);
    Route::post('/edit_category', 'AdminCategoryController@adminEditCategory')->middleware('logAdminVisit');
    Route::get('/delete_category/{id?}', 'AdminCategoryController@deleteCategory')->where(["id"=> "\d+"])->middleware('logAdminVisit');

    Route::get("/show_author", 'AdminAuthorController@showAuthor');
    Route::get("/add_author", 'AdminAuthorController@addAuthor');
    Route::post("/add_author", 'AdminAuthorController@adminAddAuthor')->middleware('logAdminVisit');
    Route::get('/edit_author/{id?}', 'AdminAuthorController@editAuthor')->where(["id"=> "\d+"]);
    Route::post('/edit_author', 'AdminAuthorController@adminEditAuthor')->middleware('logAdminVisit');
    Route::get('/delete_author/{id?}', 'AdminAuthorController@deleteAuthor')->where(["id"=> "\d+"])->middleware('logAdminVisit');

    Route::get("/show_logs", 'AdminLogController@showLogs');
});
