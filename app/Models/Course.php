<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    protected $guarded = [];


    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level', 'level_id', 'level_id');
    }

    public function instructor() {
        return $this->belongsTo('App\Models\User', 'instructor_id', 'id');
    }

    public function creator() {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
