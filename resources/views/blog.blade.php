<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='en'?'ltr':'rtl'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$blog->title}}</title>
    <link href="{{asset('webview/blog.css')}}">
    <style>
        @import url('//fonts.googleapis.com/css?family=Almarai');
        *{
            font-family: Almarai;
        }

    </style>
</head>
<body>
{!! $blog->description !!}
</body>
</html>
