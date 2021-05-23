@if ($errors->any())
    <ul class="list-unstyled mx-0 px-0" dir="rtl">
        @foreach ($errors->all() as $error)
            <li class="text-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif
