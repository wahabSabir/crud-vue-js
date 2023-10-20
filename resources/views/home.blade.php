<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vue js Crud with Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body class="min-h-screen">
        <div id="app" class="container mx-auto p-20"></div>
        @vite('resources/js/app.js')
    </body>
</html>
