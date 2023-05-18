<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
<div class="relative flex flex-col justify-center min-h-screen bg-gray-100 sm:items-center">
    <h1 class="m-4 y-5 block text-6xl">Resultat</h1>
    <div class="block">
        <p>Félicitation vous avez remporté : {{ trans('prizes.'.$user->prize) }}</p>
        <button class="rounded-full bg-blue-200 px-3 py-1 bg-center mt-2 block w-full"><a href="{{ url('/') }}">Retour au jeu</a></button>
    </div>
</div>
</body>
</html>
