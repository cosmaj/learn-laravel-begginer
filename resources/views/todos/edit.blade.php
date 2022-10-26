@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-8">
                <div class="d-flex mt-3">
                    <h2 class="mx-auto fw-bolder text-muted">Edit my Todo</h2>
                    <a href="/todos/create" class="btn btn-primary ms-auto my-1">New Todo</a>
                </div>
                <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                    <x-alert></x-alert>
                    @csrf
                    @method('patch')
                    <div class="form-group mb-3">
                        <label for="title">Task name</label>
                        <label class="w-100">
                            <input type="text" name="title" value="{{$todo->title}}" class="form-control"/>
                        </label>
                    </div>
                    <div class='form-check form-switch mb-3'>
                        <label for='completion' class='form-check-label'>Task completed?</label>
                        <input type='checkbox' class='form-check-input' name='completed' {{$todo->completed ? 'checked': ''}}/>
                    </div>
                    <div class='mb-3'>
                        <input type='reset' class='btn btn-danger' value='Reset' />
                        <button type='submit' class='btn btn-primary m-2'>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
