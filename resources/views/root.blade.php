<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'ShoppingCart') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @spladeHead
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased">
        @splade
    </body>
</html>
