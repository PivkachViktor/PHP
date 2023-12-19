<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css'
    , 'resources/js/app.js'])</head>

<body class="bg-gray-100 p-4">
<h1 class="text-3xl font-bold mb-4">Вся таблиця даних</h1>
<table class="border-collapse border w-full mb-8">
    <thead>
    <tr>
        <th class="border px-4 py-2">UserName</th>
        <th class="border px-4 py-2">Price</th>
        <th class="border px-4 py-2">Mark_1</th>
        <th class="border px-4 py-2">Mark_2</th>
        <th class="border px-4 py-2">Mark_3</th>
        <th class="border px-4 py-2">Show Btn</th>
        <th class="border px-4 py-2">Edit Btn</th>
        <th class="border px-4 py-2">Delete Btn</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td class="border px-4 py-2">{{$project->username}}</td>
            <td class="border px-4 py-2">{{$project->price}}</td>
            <td class="border px-4 py-2">{{$project->mark_1}}</td>
            <td class="border px-4 py-2">{{$project->mark_2}}</td>
            <td class="border px-4 py-2">{{$project->mark_3}}</td>
            <td class="border px-4 py-2"><a href="/projects/{{$project->id}}"
                                            class="text-blue-500 hover:underline">Show</a></td>
            <td class="border px-4 py-2"><a href="/projects/{{$project->id}}/edit"
                                            class="text-yellow-500 hover:underline">Edit</a></td>
            <td class="border px-4 py-2">
                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{$project->id}}').submit();"
                   class="text-red-500 hover:underline">Delete</a>
                <form id="delete-form-{{$project->id}}" action="/projects/{{$project->id}}" method="POST"
                      style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
    <a href="/projects/create">Create</a>
</button>

</body>

</html>
