@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <a type="button" href="{{ route('course.category') }}" class="btn btn-primary">Course Category</a>

                        <a type="button" href="{{ route('course.level') }}" class="btn btn-primary">Course Level</a>

                        <a type="button" href="{{ route('course') }}" class="btn btn-primary">Course</a>

                        <a type="button" href="{{ route('load.data') }}" class="btn btn-danger">Load Demo Data</a>
                    </div>


                    <div class="card-header mt-3">{{ __('Course Categories API') }}</div>

                    <div class="card-body">

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">API</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">0</th>
                                <td>View All Categories</td>
                                <td><a href="/api/all-categories">View JSON Response</a></td>
                            </tr>

                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td><a href="/api/category/{{ $category->category_id }}">View JSON Response</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                    <div class="card-header mt-3">{{ __('Course Levels API') }}</div>

                    <div class="card-body">

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Level Name</th>
                                <th scope="col">API</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">0</th>
                                <td>View All Levels</td>
                                <td><a href="/api/all-levels">View JSON Response</a></td>
                            </tr>

                            @foreach($levels as $level)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $level->level_name }}</td>
                                    <td><a href="/api/level/{{ $level->level_id }}">View JSON Response</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                    <div class="card-header mt-3">{{ __('Course API') }}</div>

                    <div class="card-body">

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">API</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">0</th>
                                <td>View All Courses</td>
                                <td><a href="/api/courses">View JSON Response</a></td>
                            </tr>

                            @foreach($courses as $course)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $course->course_name }}</td>
                                    <td><a href="/api/course/{{ $course->course_id }}">View JSON Response</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
