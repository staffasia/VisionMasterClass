<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

use App\Models\Category;
use App\Models\Level;
use App\Models\Course;

class CourseController extends Controller {


    public function courseCategory() {

        $categories = Category::orderBy('category_name')->get();

        return view('master-class.course.category', [
            'categories' => $categories
        ]);

    }


    public function addCourseCategory() {


        return view('master-class.course.add-category', [

        ]);

    }


    public function storeCourseCategory(Request $request) {

        $created_by = Auth::user()->id;

        $request->validate([
            'category_name' => 'required|string|max:191',
        ]);


        $category = new Category();

        $category->category_name = $request->input('category_name');
        $category->slug = Str::slug($request->input('category_name'), '-');
        $category->created_by = $created_by;

        $category->save();

        return redirect()->route('course.category');

    }



    public function courseLevel() {

        $levels = Level::orderBy('level_name')->get();

        return view('master-class.course.level', [
            'levels' => $levels
        ]);

    }


    public function addCourseLevel() {


        return view('master-class.course.add-level', [

        ]);

    }


    public function storeCourseLevel(Request $request) {

        $created_by = Auth::user()->id;

        $request->validate([
            'level_name' => 'required|string|max:191',
        ]);


        $level = new Level();

        $level->level_name = $request->input('level_name');
        $level->created_by = $created_by;

        $level->save();

        return redirect()->route('course.level');

    }



    public function course() {

        $courses = Course::orderBy('course_name')->get();

        return view('master-class.course.index', [
            'courses' => $courses
        ]);

    }


    public function addCourse() {

        $categories = Category::all();
        $levels = Level::all();
        $instructors = User::all();


        return view('master-class.course.add-course', [
            'categories' => $categories,
            'levels' => $levels,
            'instructors' => $instructors,
        ]);

    }


    public function storeCourse(Request $request) {

        $created_by = Auth::user()->id;

        $request->validate([
            'instructor_id' => 'required|gt:0',
            'category_id' => 'required|gt:0',
            'level_id' => 'required|gt:0',
            'course_name' => 'required|string|max:191',
            'price' => 'required|gt:0',
            'discount' => 'required|gt:-1',
        ]);


        $course = new Course();

        $course->instructor_id = $request->input('instructor_id');
        $course->category_id = $request->input('category_id');
        $course->level_id = $request->input('level_id');
        $course->course_name = $request->input('course_name');
        $course->slug = Str::slug($request->input('course_name'), '-');
        $course->course_title = $request->input('course_title');
        $course->free_course = $request->input('free_course');
        $course->free_course = $request->input('free_course');
        $course->price = $request->input('price');
        $course->discount_available = $request->input('discount_available');
        $course->discount = $request->input('discount');
        $course->discount_percentage = $request->input('discount');
        $course->discount_amount_type = $request->input('discount_amount_type');
        $course->course_status = $request->input('course_status');
        $course->created_by = $created_by;



        if ($request->hasFile('course_image')) {

            $file = $request->file('course_image');
            $this->validate($request, [
                'course_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $course_image = 'course_' . time() . '.' .$file->getClientOriginalExtension();
            $destinationPath = 'images/courses';
            $file->move($destinationPath, $course_image);

            $course->course_image = $course_image;

        }

        $course->save();

        return redirect()->route('course');

    }


}
