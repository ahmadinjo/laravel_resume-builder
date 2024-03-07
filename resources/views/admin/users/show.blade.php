<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Personal Details -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Personal Details</h2>
            <div class="flex items-center mb-2">
                <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden mr-4">
                    <!-- Profile Picture -->
                    <img src="{{ asset('assets/images'). '/'. $user->photo }}" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div>
                    <!-- Name -->
                    <p class="font-semibold text-xl">Name: {{ $user->name }}</p>
                    <!-- Email -->
                    <p class="text-gray-600">Email: {{ $user->email }}</p>
                    <!-- Phone Number -->
                    <p class="text-gray-600">Phone: {{ $user->phone_no }}</p>
                    <!-- Address -->
                    <p class="text-gray-600">Address: {{ $user->address }}</p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
