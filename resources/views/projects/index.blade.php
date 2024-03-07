<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Projects Information</h2>
        <a href="{{ route('projects.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add Project</button></a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Project Name</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Start Date</th>
                        <th class="px-4 py-2">End Date</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="border px-4 py-2"><a href="{{ route('projects.show', $project) }}">{{ $project->project_name }} </a></td>
                        <td class="border px-4 py-2">{{ $project->role }} </td>
                        <td class="border px-4 py-2"> </td>
                        <td class="border px-4 py-2">{{ $project->start_date }}</td>
                        <td class="border px-4 py-2">{{ $project->end_date ?? 'till date' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('projects.edit', $project) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
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
