<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css'
    , 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 p-4">
<form action="/projects/{{$project->id}}" method="post"
      class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <div class="mb-4">
        <label for="userName" class="block text-gray-700 text-sm font-bold mb-2">UserName</label>
        <input name="userName" id="userName" type="text" value="{{$project->username}}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
        <input name="price" id="price" type="text" value="{{$project->price}}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="mark_1" class="block text-gray-700 text-sm font-bold mb-2">mark_1</label>
        <input name="mark_1" id="mark_1" type="text" value="{{$project->mark_1}}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="mark_2" class="block text-gray-700 text-sm font-bold mb-2">mark_2</label>
        <input name="mark_2" id="mark_2" type="text" value="{{$project->mark_2}}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="mark_3" class="block text-gray-700 text-sm font-bold mb-2">mark_3</label>
        <input name="mark_3" id="mark_3" type="text" value="{{$project->mark_3}}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex items-center justify-center">
        <button type="submit"
                class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
            Changes</button>
    </div>
</form>
</body>

</html>
