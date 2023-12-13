<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-8 px-4">

<h1 class="text-3xl font-bold mb-6 text-center">Manufacturers</h1>

@foreach($manufacturers as $manufacturer)
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <p class="text-lg font-semibold">Name: {{ $manufacturer->brand }}</p>
        <p>Country: {{ $manufacturer->country }}</p>
        <p>Phone: {{ $manufacturer->phone }}</p>
        <p>Email: {{ $manufacturer->email }}</p>
        <a href="manufacturers/{{$manufacturer->id}}/delete" class="text-red-500 font-semibold hover:underline">Delete</a>
        <hr class="my-4 border-t-2 border-gray-200">
    </div>
@endforeach

</body>
</html>
