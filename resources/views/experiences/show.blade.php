<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience Record Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Experience Record Details</h2>
        <div>
            <p class="font-semibold">Company:</p>
            <p class="mb-4">{{ $experience->company_name }}</p>

            <p class="font-semibold">Job Title:</p>
            <p class="mb-4">{{ $experience->job_title }}</p>

            <p class="font-semibold">Description:</p>
            <p class="mb-4">{{ $experience->description }}</p>

            <p class="font-semibold">Start Date:</p>
            <p class="mb-4">{{ $experience->start_date }}</p>

            <p class="font-semibold">End Date:</p>
            <p class="mb-4">{{ $experience->end_date }}</p>

            <p class="font-semibold">Current:</p>
            <p class="mb-4">{{ $experience->current ? 'yes' : 'no' }}</p>

            <div class="mt-8">
                <a href="{{ route('experiences.edit', $experience) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>
                <form action="{{ route('experiences.destroy', $experience) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
