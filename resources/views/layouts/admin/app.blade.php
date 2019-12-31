<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
    </style>

    @yield('style')

</head>

<body>
        <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

@yield('scripts')
