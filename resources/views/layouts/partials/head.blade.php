<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(isset($pageTitle)) {{ $pageTitle }} - IntraSAIN @else IntraSAIN @endif
    </title>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
</head>