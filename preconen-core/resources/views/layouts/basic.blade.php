<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preconen : Prediksi Cuaca dan Komoditas Panen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')

</head>

<body data-theme="light">

    @yield('body')

</body>

</html>
