<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>References Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">References Information</h2>
        <a href="{{ route('references.create') }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Add Reference</button></a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Full Name</th>
                        <th class="px-4 py-2">Company</th>
                        <th class="px-4 py-2">Job Title</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Phone Number</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($references as $reference)
                    <tr>
                        <td class="border px-4 py-2"><a href="{{ route('references.show', $reference) }}">{{ $reference->name }} </a></td>
                        <td class="border px-4 py-2">{{ $reference->company_name }} </td>
                        <td class="border px-4 py-2">{{ $reference->job_title }} </td>
                        <td class="border px-4 py-2">{{ $reference->email }}</td>
                        <td class="border px-4 py-2">{{ $reference->phone_no }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('references.edit', $reference) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</button></a>
                            <form action="{{ route('references.destroy', $reference) }}" method="POST">
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
