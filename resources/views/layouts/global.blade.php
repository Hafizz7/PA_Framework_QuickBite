<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-informatika.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap');
    </style>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <body class="bg-[#EEF1FF]">
        @yield('content')
    </body>
</head>
