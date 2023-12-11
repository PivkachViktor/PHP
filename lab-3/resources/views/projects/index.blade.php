<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
<h1>Вся таблиця даних</h1>
<table border="1">
    <tr>
        <td>UserName</td>
        <td>Price</td>
        <td>Mark_1</td>
        <td>Mark_2</td>
        <td>Mark_3</td>
        <td>Show Btn</td>
        <td>Edit Btn</td>
        <td>Delete Btn</td>
    </tr>
    @foreach($projects as $project)
        <tr>
            <td>{{$project->username}}</td>
            <td>{{$project->price}}</td>
            <td>{{$project->mark_1}}</td>
            <td>{{$project->mark_2}}</td>
            <td>{{$project->mark_3}}</td>
            <td><a href="/projects/{{$project->id}}">Show</a></td>
            <td><a href="/projects/{{$project->id}}/edit">Edit</a></td>
            <td><a onclick="event.preventDefault(); document.getElementById('delete-form-{{$project->id}}').submit();">Delete
                    <form id="delete-form-{{$project->id}}" action="/projects/{{$project->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </a></td>
        </tr>
    @endforeach
</table>
<button><a href="/projects/create">Create</a></button>

</body>
</html>
