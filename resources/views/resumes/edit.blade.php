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
        <h2 class="text-2xl font-semibold mb-4">Personal Details</h2>
        <form action="{{ route('resumes.update', $resume) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Resume Name</label>
                <input type="text" name="resume_name" value="{{old('resume_name', $resume->resume_name)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="resume_name">
                <x-input-error :messages="$errors->get('resume_name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" value="{{old('fullname', $resume->fullname)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="fullname">
                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{old('email', $resume->email)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required autocomplete="email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_no" value="{{old('phone_no', $resume->phone_no)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="phone_no">
                <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" value="{{old('address', $resume->address)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="address">
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Summary</label>
                <textarea name="summary" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('summary', $resume->summary) }}</textarea>
                <x-input-error :messages="$errors->get('summary')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Skills</label>
                <input type="text" name="skills" value="{{old('skills', $resume->skills)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="skills">
                <x-input-error :messages="$errors->get('skills')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>

            <button type="submit" class="mt-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </form>
    </div>
</body>

</html>
