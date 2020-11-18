<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Validator;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseStudent;

class ProgressController extends Controller {

    public function storeProgress(Request $request) {

        /*
         * Validating Information
         */

        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'course_id' => 'required',
            'completed' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();

        $enrollment = CourseStudent::firstOrNew(array('course_id' => $input['course_id'], 'student_id'=>$input['student_id']));
        $enrollment->completed = $input['completed'];
        $enrollment->save();

        return response([
            'status' => 'success',
        ]);
    }

}
