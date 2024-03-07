<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Experience Information</h2>
        <a href="{{ route('experiences.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add Experience</button></a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Company</th>
                        <th class="px-4 py-2">Job Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Start Date</th>
                        <th class="px-4 py-2">End Date</th>
                        <th class="px-4 py-2">Current</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($experiences as $experience)
                    <tr>
                        <td class="border px-4 py-2"><a href="{{ route('experiences.show', $experience) }}">{{ $experience->company_name }} </a></td>
                        <td class="border px-4 py-2">{{ $experience->job_title }} </td>
                        <td class="border px-4 py-2"> </td>
                        <td class="border px-4 py-2">{{ $experience->start_date }}</td>
                        <td class="border px-4 py-2">{{ $experience->end_date ?? 'till date' }}</td>
                        <td class="border px-4 py-2">{{ $experience->current ? 'yes' : '' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('experiences.edit', $experience) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>

                            <form action="{{ route('experiences.destroy', $experience) }}" method="POST">
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
