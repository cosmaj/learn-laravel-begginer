@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Image upload') }}</div>

                <div class="card-body">
                    <x-alert > </x-alert>
                    <form action="{{route('avatar.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="img">Profile image</label>
                            <input type="file" name="profile_img" />
                        </div>
                        <input type="submit" value="Upload" class="btn btn-primary" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
