<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Laravel Easy Translations {{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

</head>
<body>
<div id="telescope">
    @yield('content')
</div>
</body>
</html>
