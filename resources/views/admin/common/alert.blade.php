@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif


@if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif