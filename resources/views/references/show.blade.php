<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reference Record Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Reference Record Details</h2>
        <div>
            <p class="font-semibold">Full Name:</p>
            <p class="mb-4">{{ $reference->name }}</p>

            <p class="font-semibold">Company:</p>
            <p class="mb-4">{{ $reference->company_name }}</p>

            <p class="font-semibold">Job Title:</p>
            <p class="mb-4">{{ $reference->job_title }}</p>

            <p class="font-semibold">Email:</p>
            <p class="mb-4">{{ $reference->email }}</p>

            <p class="font-semibold">Phone Number:</p>
            <p class="mb-4">{{ $reference->phone_no }}</p>


            <div class="mt-8">
                <a href="{{ route('references.edit', $reference) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>
                <form action="{{ route('references.destroy', $reference) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
