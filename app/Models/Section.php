<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model {

    use HasFactory;

    protected $table = 'sections';
    protected $primaryKey = 'section_id';

    protected $guarded = [];


    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'course_id');
    }

}
