<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CloudRich</title>
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>

<body>
    <div id="app">
        <input type="hidden" id="property" value="{{$property}}">
    </div>
    <script src="{{ mix('js/script.js') }}"></script>
</body>

</html>