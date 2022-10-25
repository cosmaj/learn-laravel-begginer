@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-8">
                <form action="/todos/create" method="POST">
                    @csrf
                    <h2>Have some tasks need to keep track of?</h2>
                    <x-alert></x-alert>
                    <div class="form-group mb-2">
                        <label for="title">Task title</label>
                        <label class="w-100">
                            <input type="text" name="title" class="form-control" />
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/todos" class="btn btn-success my-1 mx-2">All Todos</a>
                </form>
            </div>
        </div>
    </div>
@endsection
