<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body class="antialiased">
<form action="/projects" method="post">
    @csrf
    <label for="">
        UserName
        <input name="username" type="text">
    </label>
    <label for="">
        Price
        <input name="price" type="text">
    </label>
    <label for="">
        mark_1
        <input name="mark_1" type="text">
    </label>
    <label for="">
        mark_2
        <input name="mark_2" type="text">
    </label>
    <label for="">
        mark_3
        <input name="mark_3" type="text">
    </label>
    <button type="submit">Save</button>
</form>
</body>
</html>
