@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Course Level') }}</div>

                    <div class="card-body">

                        <a type="button" href="{{ route('add.level') }}" class="btn btn-primary">Add Course Level</a>

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Level</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($levels as $level)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $level->level_name }}</td>
                                    <td>{{ $level->creator->first_name }}</td>
                                    <td>{{ $level->created_at }}</td>
                                    <td>
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
