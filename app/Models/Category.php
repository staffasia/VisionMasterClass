<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    use HasFactory;

    protected $table = 'course_categories';
    protected $primaryKey = 'category_id';

    protected $guarded = [];


    public function creator() {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

}
