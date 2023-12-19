<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css'
        , 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 p-4">
<div class="max-w-md mx-auto bg-white shadow-md rounded p-4">
    <div class="mb-4">
        <p class="font-bold">Username:</p>
        <p>{{$project->username}}</p>
    </div>
    <hr class="my-4">
    <div class="mb-4">
        <p class="font-bold">Price:</p>
        <p>{{$project->price}}</p>
    </div>
    <hr class="my-4">
    <div class="mb-4">
        <p class="font-bold">mark_1:</p>
        <p>{{$project->mark_1}}</p>
    </div>
    <hr class="my-4">
    <div class="mb-4">
        <p class="font-bold">mark_2:</p>
        <p>{{$project->mark_2}}</p>
    </div>
    <hr class="my-4">
    <div class="mb-4">
        <p class="font-bold">mark_3:</p>
        <p>{{$project->mark_3}}</p>
    </div>
</div>
</body>

</html>
