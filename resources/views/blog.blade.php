<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='en'?'ltr':'rtl'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$blog->title}}</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 10px;
        }
        img {
            padding: 0;
            display: block;
            margin: 0 auto;
            max-height: 100%;
            max-width: 100%;
            height: auto !important;
            width: auto !important;
        }
    </style>
</head>
<body>
{!! $blog->description !!}
</body>
</html>
