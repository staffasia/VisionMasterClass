<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Validator;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseStudent;

class RatingController extends Controller {

    public function storeRating(Request $request) {

        /*
         * Validating Information
         */

        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'course_id' => 'required',
            'rating' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();

        $enrollment = CourseStudent::firstOrNew(array('course_id' => $input['course_id'], 'student_id'=>$input['student_id']));
        $enrollment->is_rated = '1';
        $enrollment->save();



        $course = Course::find($input['course_id']);

        $rating = intval($course->rating) + intval($input['rating']);
        $rating_count = intval($course->rating_count) + 1;

        $div_number = $course->rating_count==0?1:2;

        $rating = ($rating/$div_number);

        $course->rating = $rating;
        $course->rating_count = $rating_count;
        $course->save();


        return response([
            'status' => 'success',
        ]);
    }

}
