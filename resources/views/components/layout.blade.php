@props([
    'title' => 'Craft Gallery'
])
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        nav {
            font-weight: bolder;
        }

        main {
            padding: 2% 5%;
        }
    </style>
</head>
<body>
@include('partials.navigation')
<main>
    {{$slot}}
</main>
</body>
</html>
