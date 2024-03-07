<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">{{ $resume->resume_name }} - Reference Details</h2>
        <form action="{{ route('resumes.updateReferences', ['resume' => $resume]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")



                @foreach ($user->references as $reference)
                <div class="flex items-center mt-6">
                    <input type="checkbox" name="references[]" value="{{ $reference->id }}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="references" class="ml-2 block text-sm text-gray-900">
                        {{ $reference->name }} - {{ $reference->job_title }} @ {{ $reference->company_name }}
                    </label>

                </div>
                @endforeach
                <x-input-error :messages="$errors->get('references')" class="mt-2" />


            <button type="submit" class="mt-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </form>
    </div>
</body>

</html>
