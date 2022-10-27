@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-9">
                <div class="d-flex mt-3">
                    <h2 class="mx-auto fw-bolder text-muted">All Todos</h2>
                    <a href="/todos/create" class="btn text-primary ms-auto mt-1 fs-2"><i class="fa fa-plus-circle"></i></a>
                </div>
                <x-alert></x-alert>
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            @if($todo->completed)
                                <td> <del>{{ $todo->title }}</del> </td>
                            @else
                                <td> {{ $todo->title }} </td>
                            @endif
                            <td> {{ $todo->created_at }} </td>
                            <td> {{ $todo->updated_at }} </td>
                            <td>
                                @if($todo->completed)
                                    <span class="btn text-success fw-bolder"><i class="fa fa-check"></i></span>
                                @else
                                    <span class="btn text-muted text-secondary" onclick="document.querySelector('#form-completed-{{$todo->id}}').submit();"><i class="fa fa-check"></i></span>
                                    <form class="d-none" id="form-completed-{{$todo->id}}" method="POST" action="{{route('todo.completed', $todo->id)}}">
                                        @csrf
                                        @method('put')
                                    </form>
                                @endif
                                <a href="/todos/change/{{$todo->id}}" class="btn text-warning"><i class="fa fa-pen"></i></a>
                                <span class="btn text-danger" onclick="document.querySelector('#form-delete-{{$todo->id}}').submit();"><i class="fa fa-trash"></i></span>
                                <form class="d-none" id="form-delete-{{$todo->id}}" method="POST" action="{{route('todo.delete', $todo->id)}}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
