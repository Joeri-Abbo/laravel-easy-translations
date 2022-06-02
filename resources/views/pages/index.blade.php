<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Laravel Easy Translations {{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>
    <link rel="stylesheet" href="{{asset(mix('/css/app.css', 'vendor/laravel-easy-translations'))}}">
    <script src="{{asset(mix('/js/app.js', 'vendor/laravel-easy-translations'))}}"></script>
</head>
<body>
<div id="telescope">
    <div class="bg-red-600 text-5xl italic">
        I Love You In Every Universe
        @yield('content')
    </div>
</div>
</body>
</html>
