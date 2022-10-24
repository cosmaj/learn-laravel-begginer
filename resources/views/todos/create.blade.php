@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <form action="/todos/create" method="POST">
                @csrf
                <h2>Have some tasks need to keep track of?</h2>
                <x-alert></x-alert>
                <div class="form-group mb-2">
                    <label for="title">Task title</label>
                    <input type="text" name="title" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/todos" class="btn btn-success my-1 mx-2">All Todos</a>
            </form>
        </div>
    </div>
@endsection
