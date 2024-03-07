<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Section</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Education</h2>
        <form action="{{ route('education.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">School</label>
                <input type="text" name="school" value="{{old('school')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="school">
                <x-input-error :messages="$errors->get('school')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Course</label>
                <input type="text" name="course" value="{{old('course')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="course">
                <x-input-error :messages="$errors->get('course')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Qualification</label>
                <input type="text" name="qualification" value="{{old('qualification')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="qualification">
                <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Grade</label>
                <input type="text" name="grade" value="{{old('grade')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="grade">
                <x-input-error :messages="$errors->get('grade')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>
            </div>
            <div class="flex items-center mt-6">
                <input type="checkbox" name="current" value="1" @checked(old('current')) class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="current" class="ml-2 block text-sm text-gray-900">
                    Currently studying here
                </label>
                <x-input-error :messages="$errors->get('current')" class="mt-2" />
            </div>
            <button type="submit" class="mt-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </form>
    </div>
</body>

</html>
