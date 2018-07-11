<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .nav-link {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div id="dev">
        <app></app>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9yqc5WEPAMG8sUJz_VmTPHE6SItFSO8A"></script>

    <script src="{{ asset('js/app.js') }}" ></script>
    <script>

    </script>
</body>
</html>