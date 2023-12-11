<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body class="antialiased">
<form action="/projects/{{$project->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <label for="">
        UserName
        <input name="userName" type="text" value="{{$project->username}}">
    </label>
    <label for="">
        Price
        <input name="price" type="text" value="{{$project->price}}">
    </label>
    <label for="">
        mark_1
        <input name="mark_1" type="text" value="{{$project->mark_1}}">
    </label>
    <label for="">
        mark_2
        <input name="mark_2" type="text" value="{{$project->mark_2}}">
    </label>
    <label for="">
        mark_3
        <input name="mark_3" type="text" value="{{$project->mark_3}}">
    </label>
    <button type="submit">Save</button>
</form>
</body>
</html>
