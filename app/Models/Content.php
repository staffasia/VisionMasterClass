<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    use HasFactory;

    protected $table = 'lecture_contents';
    protected $primaryKey = 'content_id';

    protected $guarded = [];


    public function section() {
        return $this->belongsTo('App\Models\Section', 'section_id', 'section_id');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'course_id');
    }

}
