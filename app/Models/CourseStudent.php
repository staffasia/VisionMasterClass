<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model {

    use HasFactory;

    protected $table = 'course_student';
    protected $primaryKey = 'id';

    protected $guarded = [];


    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'course_id');
    }

    public function student() {
        return $this->belongsTo('App\Models\User', 'student_id', 'id');
    }
}
