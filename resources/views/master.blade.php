<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <nav class="flex flex-row bg-red-700 w-full h-14 p-2 px-9 align-middle justify-between">
        <div class="basis-1/4">
            <h1>Pusat Studi</h1>
        </div>
        <div class="basis-1/2 inset-y-0 right-0">
        </div>
    </nav>

    <div>
        @extends('home.dashboard')
    </div>
</body>
</html>
