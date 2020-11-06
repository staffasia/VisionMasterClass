@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Courses') }}</div>

                    <div class="card-body">

                        <a type="button" href="{{ route('add.course') }}" class="btn btn-primary">Add Course</a>


                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Level</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($courses as $course)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->category->category_name }}</td>
                                    <td>{{ $course->level->level_name }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->discount }}</td>
                                    <td>{{ ucfirst($course->course_status) }}</td>
                                    <td>{{ $course->instructor->first_name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success">View</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
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
