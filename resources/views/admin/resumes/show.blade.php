<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resume->resume_name }} Resume</title>
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
                    <img src="{{ asset('assets/images'). '/'. $resume->photo }}" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div>
                    <!-- Name -->
                    <p class="font-semibold text-xl">{{ $resume->fullname }}</p>
                    <!-- Email -->
                    <p class="text-gray-600">{{ $resume->email }}</p>
                    <!-- Phone Number -->
                    <p class="text-gray-600">{{ $resume->phone_no }}</p>
                    <!-- Address -->
                    <p class="text-gray-600">{{ $resume->address }}</p>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Summary</h2>
            <p class="text-gray-700">{{ $resume->summary }}</p>
        </div>

        <!-- Skills -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Skills</h2>
            <p>{{ $resume->skills }}</P>
            {{-- <ul class="list-disc list-inside">
                <li>JavaScript</li>
                <li>React</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>Node.js</li>
            </ul> --}}
        </div>

        <!-- Work Experiences -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Work Experiences</h2>
            @foreach ($experiences as $experience)
                <div>
                    <p class="font-semibold">{{ $experience->company_name }} - {{ $experience->start_date }} - {{ $experience->end_date ?? 'till date' }}</p>
                    <p class="italic">{{ $experience->job_title }}</p>
                    <p>{{ $experience->description }}</p>
                </div>
            @endforeach

        </div>

        <!-- Education -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Education</h2>
            @foreach ($education as $edu)
                <div>
                <p class="font-semibold">{{ $edu->school }} - {{ $edu->start_date }} - {{ $edu->end_date ?? 'till date'}}</p>
                <p>{{ $edu->course }}</p>
                <p>{{ $edu->qualification }}</p>
                <p>{{ $edu->description }}</p>
            </div>
            @endforeach

        </div>

        <!-- Projects -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Projects</h2>
            @foreach ($projects as $project)
                <div>
                <p class="font-semibold">{{ $project->project_name }} - {{ $project->start_date }} - {{ $project->end_date }}</p>
                <p>{{ $project->role }}</p>
                <p>{{ $project->description }}</p>
            </div>
            @endforeach

        </div>

        <!-- References -->
        <div>
            <h2 class="text-2xl font-semibold mb-2">References</h2>
            @foreach ($references as $reference)
                <div>
                <p class="font-semibold">{{ $reference->name }}</p>
                <p>{{ $reference->company_name }}</p>
                <p>{{ $reference->job_title }}</p>
                <p>{{ $reference->email }}</p>
                <p>{{ $reference->phone_no }}</p>
            </div>
            @endforeach

        </div>
    </div>
</body>

</html>
