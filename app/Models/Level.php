<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model {

    use HasFactory;

    protected $table = 'course_levels';
    protected $primaryKey = 'level_id';

    protected $guarded = [];


    public function creator() {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
