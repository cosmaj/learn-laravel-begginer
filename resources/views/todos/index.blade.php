@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex">
                    <h2>All Todos</h2>
                    <a href="/todos/create" class="btn btn-primary mx-2 my-1">New Todo</a>
                </div>
                <table class="table-responsive table-striped">
                    <thead>
                    <tr>
                        <td>Task Name</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td> {{ $todo->title }} </td>
                            <td>
                                <a href="/todos/change" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/todos/change" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
