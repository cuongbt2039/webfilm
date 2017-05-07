<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
        <title>Nguoi Phan Xu</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=vietnamese" rel="stylesheet">
        <style>
            body{
                font-family: 'Roboto Condensed', sans-serif;
            }
        </style>
         @yield('css')
    </head>
    <body>
        @yield('body')
        @yield('js_footer')
    </body>
</html>
