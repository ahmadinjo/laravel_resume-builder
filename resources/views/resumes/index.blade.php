<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Resume Information</h2>
        <a href="{{ route('resumes.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Create New Resume</button></a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($resumes as $resume)
                    <tr>
                        <td class="border px-4 py-2">{{ $resume->id }} </td>
                        <td class="border px-4 py-2"><a href="{{ route('resumes.show', $resume) }}">{{ $resume->resume_name }} </a></td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('resumes.edit', $resume) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <a href="{{ route('resumes.downloadResume', $resume) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Download</a>
                            <form action="{{ route('resumes.destroy', $resume) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                    <!-- Add more rows dynamically using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
