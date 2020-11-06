@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Course') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('store.course') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                                <div class="col-md-8">
                                    <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required>

                                    @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="course_title" class="col-md-4 col-form-label text-md-right">{{ __('Course Title') }}</label>

                                <div class="col-md-8">
                                    <input id="course_title" type="text" class="form-control @error('course_title') is-invalid @enderror" name="course_title" value="{{ old('course_title') }}">

                                    @error('course_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Course Category') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="level_id" class="col-md-4 col-form-label text-md-right">{{ __('Course Level') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('level_id') is-invalid @enderror" name="level_id">
                                        @foreach($levels as $level)
                                            <option value="{{ $level->level_id }}">{{ $level->level_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('level_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="instructor_id" class="col-md-4 col-form-label text-md-right">{{ __('Instructor') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('instructor_id') is-invalid @enderror" name="instructor_id">
                                        @foreach($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('instructor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="free_course" class="col-md-4 col-form-label text-md-right">{{ __('Free Course') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('free_course') is-invalid @enderror" name="free_course">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>

                                    @error('free_course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Course Price') }}</label>

                                <div class="col-md-8">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="discount_available" class="col-md-4 col-form-label text-md-right">{{ __('Discount Available') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('discount_available') is-invalid @enderror" name="discount_available">

                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>

                                    @error('discount_available')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>

                                <div class="col-md-8">
                                    <input id="discount" type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="0" required>

                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="discount_amount_type" class="col-md-4 col-form-label text-md-right">{{ __('Discount Type') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('discount_amount_type') is-invalid @enderror" name="discount_amount_type">
                                        <option value="cash">Cash</option>
                                        <option value="percentage">Percentage</option>
                                    </select>

                                    @error('discount_amount_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="course_image" class="col-md-4 col-form-label text-md-right">{{ __('Course Image') }}</label>

                                <div class="col-md-8">

                                    <input type="file" class="form-control @error('course_image') is-invalid @enderror" accept="image/*" name="course_image">

                                    @error('course_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="course_status" class="col-md-4 col-form-label text-md-right">{{ __('Course Status') }}</label>

                                <div class="col-md-8">

                                    <select class="form-control @error('course_status') is-invalid @enderror" name="course_status">
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>

                                    @error('course_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
