<?php

namespace App\Models;


class Category {
    private $table = 'category';

    public function getCategories () {
        return \DB::table($this->table)
            ->select("id", "name", "color")
            ->get();
    }

    public function getCategoryWithId($id) {
        return \DB::table($this->table)
            ->select("id", "name", "color")
            ->where([
                ["id", "=", $id]
            ])
            ->first();
    }

    public function insertCategory($name, $color) {
        return \DB::table($this->table)
            ->insertGetId(['name' => $name, 'color' => $color]);
    }

    public function editCategory($name, $color, $id) {
        \DB::table($this->table)
            ->where('id', $id)
            ->update(['name' => $name, 'color' => $color]);
    }

    public function deleteCategory($id) {
        \DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }
}
