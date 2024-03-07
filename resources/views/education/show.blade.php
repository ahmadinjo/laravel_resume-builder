<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Record Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Education Record Details</h2>
        <div>
            <p class="font-semibold">School:</p>
            <p class="mb-4">{{ $education->school }}</p>

            <p class="font-semibold">Course:</p>
            <p class="mb-4">{{ $education->course }}</p>

            <p class="font-semibold">Qualification:</p>
            <p class="mb-4">{{ $education->qualification }}</p>

            <p class="font-semibold">Grade:</p>
            <p class="mb-4">{{ $education->grade }}</p>

            <p class="font-semibold">Description:</p>
            <p class="mb-4">{{ $education->description }}</p>

            <p class="font-semibold">Start Date:</p>
            <p class="mb-4">{{ $education->start_date }}</p>

            <p class="font-semibold">End Date:</p>
            <p class="mb-4">{{ $education->end_date }}</p>

            <p class="font-semibold">Current:</p>
            <p class="mb-4">{{ $education->current ? 'yes' : 'no' }}</p>

            <div class="mt-8">
                <a href="{{ route('education.edit', $education) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>
                <form action="{{ route('education.destroy', $education) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>


</body>

</html>
