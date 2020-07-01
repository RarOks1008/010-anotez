<?php

namespace App\Models;


class AuthorImage {
    private $table = 'author';

    public function getAll() {
        return \DB::table($this->table)
            ->select("*")
            ->get();
    }

    public function getImageWithId($id) {
        return \DB::table($this->table)
            ->select("*")
            ->where([
                ["id", "=", $id]
            ])
            ->first();
    }

    public function addAuthorImage($author_image, $is_author) {
        return \DB::table($this->table)
            ->insertGetId(['author_image' => $author_image, 'is_author' => $is_author]);
    }

    public function deleteAuthorImage($id) {
        \DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function editWithAuthorImage($author_image, $is_author, $id) {
        \DB::table($this->table)
            ->where('id', $id)
            ->update(['author_image' => $author_image, 'is_author' => $is_author]);
    }

    public function editIsAuthor($is_author, $id) {
        \DB::table($this->table)
            ->where('id', $id)
            ->update(['is_author' => $is_author]);
    }
}
