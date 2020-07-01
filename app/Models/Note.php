<?php

namespace App\Models;


class Note {
    private $table_long = 'note AS n';
    private $table_short = 'note';

    public function getNoteCount ($email) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->where([
                ["u.email", "=", $email]
            ])
            ->count();
    }
    public function getNoteWithId ($email, $id) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->select("n.title", "n.text", "n.id", "c.color", "c.name")
            ->where([
                ["u.email", "=", $email],
                ["n.id", "=", $id]
            ])
            ->first();
    }
    public function insertNote ($title, $text, $category, $user) {
        return \DB::table($this->table_short)
            ->insertGetId(['title' => $title, 'text' => $text, 'category_id' => $category, 'user_id' => $user]);
    }
    public function editNote ($id, $title, $text, $category) {
        \DB::table($this->table_short)
            ->where('id', $id)
            ->update(['title' => $title, 'text' => $text, 'category_id' => $category]);
    }
    public function deleteNote ($id) {
        \DB::table($this->table_short)
            ->where('id', $id)
            ->delete();
    }

    public function getNotes ($email) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->select("n.title", "n.text", "n.id", "c.color", "c.name")
            ->where([
                ["u.email", "=", $email]
            ])
            ->paginate(5);
    }

    public function getNotesWithCategory ($category, $email) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->select("n.title", "n.text", "n.id", "c.color", "c.name")
            ->where([
                ["u.email", "=", $email],
                ["c.id", "=", $category]
            ])
            ->paginate(5);
    }

    public function getNotesWithTitle ($title, $email) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->select("n.title", "n.text", "n.id", "c.color", "c.name")
            ->where([
                ["u.email", "=", $email],
                ["n.title", "like", '%'.$title.'%']
            ])
            ->paginate(5);
    }

    public function getNotesWithCategoryAndTitle ($category, $title, $email) {
        return \DB::table($this->table_long)
            ->join("category AS c", "n.category_id", "=", "c.id")
            ->join("user AS u", "n.user_id", "=", "u.id")
            ->select("n.title", "n.text", "n.id", "c.color", "c.name")
            ->where([
                ["u.email", "=", $email],
                ["c.id", "=", $category],
                ["n.title", "like", '%'.$title.'%']
            ])
            ->paginate(5);
    }
}
