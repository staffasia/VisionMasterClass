<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\CourseStudent;

class ProfileController extends Controller {

    public $successStatus = 200;


    public function index($id) {

        $user = User::find($id);

        $my_courses = DB::table('course_student')
            ->select('courses.*', 'users.first_name as instructor', 'course_categories.category_name')
            ->where('course_student.student_id', $id)
            ->join('courses', 'courses.course_id', 'course_student.course_id')
            ->join('users', 'users.id', 'courses.instructor_id')
            ->join('course_categories', 'course_categories.category_id', 'courses.category_id')
            ->get();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'my_courses' => $my_courses,
        ]);

    }


    public function getMyCourse($id) {

        $my_courses = DB::table('course_student')
            ->select('courses.*', 'users.first_name as instructor', 'course_categories.category_name')
            ->where('course_student.student_id', $id)
            ->join('courses', 'courses.course_id', 'course_student.course_id')
            ->join('users', 'users.id', 'courses.instructor_id')
            ->join('course_categories', 'course_categories.category_id', 'courses.category_id')
            ->get();

        return response()->json([
            'status' => 'success',
            'my_courses' => $my_courses,
        ]);

    }

}
