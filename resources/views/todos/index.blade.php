@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-8">
                <div class="d-flex mt-3">
                    <h2 class="mx-auto fw-bolder text-muted">All Todos</h2>
                    <a href="/todos/create" class="btn btn-primary ms-auto my-1">New Todo</a>
                </div>
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Completed</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td> {{ $todo->title }} </td>
                            <td> {{ $todo->created_at }} </td>
                            <td> {{ $todo->updated_at }} </td>
                            <td> {{ $todo->completed ? 'Yes' : 'No' }} </td>
                            <td>
                                <a href="/todos/change" class="btn btn-sm btn-warning mb-1">Edit</a>
                                <a href="/todos/change" class="btn btn-sm btn-danger mb-1">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
