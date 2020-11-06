<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Level;
use App\Models\Course;

class DashboardController extends Controller {

    public function index() {

        $categories = Category::all();
        $levels = Level::all();
        $courses = Course::all();


        return view('master-class.dashboard.index', [
            'categories' => $categories,
            'levels' => $levels,
            'courses' => $courses,
        ]);

    }

}
