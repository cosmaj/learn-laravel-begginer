@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="shadow-lg col-md-8">
                <form action="{{route('todo.create')}}" method="POST">
                    @csrf
                    <h2>Have some tasks need to keep track of?</h2>
                    <x-alert></x-alert>
                    <div class="form-group mb-2">
                        <label for="title">Task title</label>
                        <label class="w-100">
                            <input type="text" name="title" class="form-control" />
                        </label>
                    </div>
                    <a href="{{route('todo.index')}}" class="btn text-primary text-muted my-1 me-1 fs-3"><i class="fa fa-arrow-left"></i></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
