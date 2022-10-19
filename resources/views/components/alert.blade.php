<div>
    @if(session()->has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_message') }}
            {{ $slot }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif(session()->has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error_message') }}
            {{ $slot }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            <ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</div>