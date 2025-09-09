<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MVIH') }}</title>
    @vite('resources/js/memorama.js') {{-- Carga Vite --}}
</head>
<body>
    <div id="memorama"></div> {{-- Vue montará aquí Memorama Game--}}
</body>
</html>