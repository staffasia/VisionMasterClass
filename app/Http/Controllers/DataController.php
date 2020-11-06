<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use DB;

use App\Models\Category;
use App\Models\Level;
use App\Models\Course;

class DataController extends Controller {


    public function loadDemoData() {

        $this->loadCourseCategory();
        $this->loadCourseLevel();
        $this->loadCourse();
        $this->loadSection();

        return redirect()->back();

    }


    private function loadCourseCategory() {

        $created_by = Auth::user()->id;


        $count = DB::table('course_categories')->count();

        if ($count == 0) {

            $categories = json_decode(json_encode(config('global.course_categories')));

            foreach ($categories as $category) {

                $object = new Category();

                $object->category_name = $category->category_name;
                $object->slug = Str::slug($category->category_name, '-');
                $object->created_by = $created_by;

                $object->save();
            }
        }
    }


    private function loadCourseLevel() {

        $created_by = Auth::user()->id;

        $count = DB::table('course_levels')->count();

        if ($count == 0) {

            $levels = json_decode(json_encode(config('global.course_levels')));

            foreach ($levels as $level) {

                $object = new Level();

                $object->level_name = $level->level_name;
                $object->created_by = $created_by;

                $object->save();
            }
        }
    }


    private function loadCourse() {

        $created_by = Auth::user()->id;

        $count = DB::table('courses')->count();

        if ($count == 0) {


            $data = DB::table('course_categories')->select('category_id')->get();
            $categories = array();
            foreach($data as $row) array_push($categories, $row->category_id);



            $data = DB::table('course_levels')->select('level_id')->get();
            $levels = array();
            foreach($data as $row) array_push($levels, $row->level_id);




            $courses = json_decode(json_encode(config('global.courses')));

            foreach ($courses as $course) {

                $object = new Course();

                $object->instructor_id = $created_by;
                $object->category_id = $categories[rand(0, (count($categories)-1) )];
                $object->level_id = $levels[rand(0, (count($levels)-1) )];
                $object->course_name = $course->course_name;
                $object->slug = Str::slug($course->course_name, '-');

                $object->course_title = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
                $object->course_overview = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).';
                $object->what_will_i_learn = 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $object->course_requirement = 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.';

                $object->price = rand(1000, 5000);
                $object->course_status = 'published';
                $object->created_by = $created_by;

                $object->save();
            }
        }
    }


    private function loadSection() {

        $created_by = Auth::user()->id;

        $count = DB::table('sections')->count();

        if ($count == 0) {

            $courses = DB::table('courses')->get();

            foreach ($courses as $course) {

                $max_section_count = 8;

                for($i=0; $i<$max_section_count; $i++) {

                    DB::table('sections')->insert([
                        'course_id' =>  $course->course_id,
                        'section_name' =>  'Section ' . ($i+1),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                }

            }

        }



    }


}
