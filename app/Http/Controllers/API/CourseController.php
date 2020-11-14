<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class CourseController extends Controller {


    public function index() {

        $courses = DB::table('courses')
            ->select('courses.*', 'users.first_name as instructor')
            ->join('users', 'users.id', 'courses.instructor_id')
            ->get();


        return response([
            'status' => 'success',
            'courses' => $courses,
        ]);

    }


    public function course($course_id) {

        $course = DB::table('courses')
            ->select('courses.*', 'users.first_name as instructor')
            ->where('courses.course_id', $course_id)
            ->join('users', 'users.id', 'courses.instructor_id')
            ->first();


        $sections = DB::table('sections')
            ->where('course_id', $course_id)
            ->get();

        $section_data = [];


        foreach($sections as $section) {

            $contents = DB::table('lecture_contents')
                ->where('lecture_contents.section_id', $section->section_id)
                ->get();


            $section_object = [
                "section_id" => $section->section_id,
                "section_name" => $section->section_name,
                "section_items" => $contents,
            ];

            array_push($section_data, $section_object);

        }


        return response([
            'status' => 'success',
            'course' => $course,
            'sections' => $section_data,
        ]);

    }


    public function allCategories() {

        $categories = DB::table('course_categories')
            ->select('course_categories.*'
                , DB::raw("(SELECT COUNT(course_id) FROM courses WHERE category_id=course_categories.category_id) as course_count"))
            ->get();

        $course_image_path = 'http://139.59.197.12/images/courses/';
        $category_wise_course = [];


        foreach($categories as $category) {

            $courses = DB::table('courses')
                ->select('course_categories.category_name', 'courses.*', 'users.first_name as instructor')
                ->where('courses.category_id', $category->category_id)
                ->join('users', 'users.id', 'courses.instructor_id')
                ->join('course_categories', 'course_categories.category_id', 'courses.category_id')
                ->limit(10)
                ->get();


            //$category_name = $category->category;

            $category_object = [
                "category_id" => $category->category_id,
                "category_name" => $category->category_name,
                "slug" => $category->slug,
                "created_by" => $category->created_by,
                "created_at" => $category->created_at,
                "updated_at" => $category->updated_at,
                "course_count" => $category->course_count,
                "course_data" => $courses,
            ];

            array_push($category_wise_course, $category_object);

        }


        return response([
            'status' => 'success',
            //'categories' => $categories,
            'course_image_path' => $course_image_path,
            'categories' => $category_wise_course,
        ]);

    }


    public function home() {

        $categories = DB::table('course_categories')
            ->select('course_categories.*'
                , DB::raw("(SELECT COUNT(course_id) FROM courses WHERE category_id=course_categories.category_id) as course_count"))
            ->get();


        $course_image_path = 'http://139.59.197.12/images/courses/';
        $category_wise_course = [];


        foreach($categories as $category) {

            $courses = DB::table('courses')
                ->select('course_categories.category_name', 'courses.*', 'users.first_name as instructor')
                ->where('courses.category_id', $category->category_id)
                ->join('users', 'users.id', 'courses.instructor_id')
                ->join('course_categories', 'course_categories.category_id', 'courses.category_id')
                ->limit(10)
                ->get();


            //$category_name = $category->category;

            $category_object = [
                "category_id" => $category->category_id,
                "category_name" => $category->category_name,
                "slug" => $category->slug,
                "created_by" => $category->created_by,
                "created_at" => $category->created_at,
                "updated_at" => $category->updated_at,
                "course_count" => $category->course_count,
                "course_data" => $courses,
            ];

            //$count_array = array('course_count' => $category->course_count);
            //$category_array = array('category_data' => $category_object);
            //$course_array = array('course_data' => $courses);
            //$data = $count_array + $category_array + $course_array;
            //$data = $count_array + $category_array + $course_array;

            //array_push($category_object, $category);
            //array_push($category_object, $courses);

            array_push($category_wise_course, $category_object);

        }


        $latest_courses = DB::table('courses')
            ->select('course_categories.category_name', 'courses.*', 'users.first_name as instructor')
            ->join('users', 'users.id', 'courses.instructor_id')
            ->join('course_categories', 'course_categories.category_id', 'courses.category_id')
            ->orderBy('courses.created_at', 'desc')
            ->limit(10)
            ->get();


        $tutors = DB::table('users')
            ->select('users.id', 'users.first_name')
            ->where('role', 'tutor')
            ->get();





        return response([
            'status' => 'success',
            //'categories' => $categories,
            'course_image_path' => $course_image_path,
            'categories' => $category_wise_course,
            'latest_course' => $latest_courses,
            'popular_course' => $latest_courses,
            'tutors' => $tutors,
        ]);

    }


    public function courseCategory($category_id) {

        $courses = DB::table('courses')
            ->select('courses.*', 'users.first_name as instructor')
            ->where('courses.category_id', $category_id)
            ->join('users', 'users.id', 'courses.instructor_id')
            ->get();


        return response([
            'status' => 'success',
            'courses' => $courses,
        ]);

    }


    public function allLevels() {

        $levels = DB::table('course_levels')
            ->select('course_levels.*')
            ->get();

        return response([
            'status' => 'success',
            'levels' => $levels,
        ]);

    }


    public function courseLevel($level_id) {

        $courses = DB::table('courses')
            ->select('courses.*', 'users.first_name as instructor')
            ->where('courses.level_id', $level_id)
            ->join('users', 'users.id', 'courses.instructor_id')
            ->get();


        return response([
            'status' => 'success',
            'courses' => $courses,
        ]);

    }


    public function search($key) {

        $courses = DB::table('courses')
            ->select('courses.*', 'users.first_name as instructor')
            ->where('courses.course_name', 'LIKE', "%{$key}%")
            ->join('users', 'users.id', 'courses.instructor_id')
            ->get();


        $categories = DB::table('course_categories')
            ->where('category_name', 'LIKE', "%{$key}%")
            ->get();


        $tutors = DB::table('users')
            ->where('first_name', 'LIKE', "%{$key}%")
            ->orWhere('last_name', 'LIKE', "%{$key}%")
            ->get();















        return response([
            'status' => 'success',
            'course_data' => $courses,
            'categories' => $categories,
            'tutors' => $tutors,
        ]);

    }

}