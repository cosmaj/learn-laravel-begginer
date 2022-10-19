@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
            </div> -->

            <div class="card">
                <div class="card-header">{{ __('Image upload') }}</div>

                <div class="card-body">
                    <x-alert > in image Upload </x-alert>
                    <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="img">Plofile image</label>
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
