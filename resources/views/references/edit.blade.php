<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reference</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Reference</h2>
        <form action="{{ route('references.update', $reference) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" value="{{old('name', $reference->name)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" name="company_name" value="{{old('company_name', $reference->company_name)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="company_name">
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" value="{{old('job_title', $reference->job_title)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="job_title">
                <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{old('email', $reference->email)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone_no" value="{{old('phone_no', $reference->phone_no)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="phone_no">
                <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
            </div>

            <button type="submit" class="mt-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </form>
    </div>
</body>

</html>
