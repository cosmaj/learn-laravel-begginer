@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-9">
                <div class="d-flex mt-3">
                    <h2 class="mx-auto fw-bolder text-muted">All Todos</h2>
                    <a href="/todos/create" class="btn btn-primary ms-auto my-1">New Todo</a>
                </div>
                <x-alert></x-alert>
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                        <th>Completed</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            @if($todo->completed)
                                <td> <span class="text-success">{{ $todo->title }}</span> </td>
                            @else
                                <td> {{ $todo->title }} </td>
                            @endif
                            <td> {{ $todo->created_at }} </td>
                            <td> {{ $todo->updated_at }} </td>
                            <td> {{ $todo->completed ? 'Yes' : 'No' }} </td>
                            <td>
                                <a href="/todos/change/{{$todo->id}}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                <a href="{{route('todo.delete',$todo->id)}}" class="btn btn-sm btn-danger mb-1">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
