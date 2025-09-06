<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kerala Lottery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-3 flex justify-between">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <div class="space-x-6">
            <a href="{{ route('customer.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('customer.ad') }}" class="hover:underline">Account Details</a>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
    <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-xl p-8 mt-5">
        <!-- Include reusable prize card/table -->
        @include('components.table', [
        'title' => '🎉 Bumper Prize 🎉',
        'amount' => '₹ 1 Cr',
        'tickets' => ['KL984270'],
        'bg' => 'yellow-100',
        'color' => 'red-600'
        ])
        @include('components.table', [
        'title' => '1st Prize',
        'amount' => '₹ 50 Lacs',
        'tickets' => ['KL984270'],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '2nd Prize',
        'amount' => '₹ 25 Lacs',
        'tickets' => ['KL984270','KL984270','KL984270','KL984270','KL984270','KL984270','KL984270'],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '3rd Prize',
        'amount' => '₹ 12 Lacs',
        'tickets' => ['KL984270'],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '4th Prize',
        'amount' => '₹ 8 Lacs',
        'tickets' => [],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])

        @include('components.table', [
        'title' => 'Consolidated Prize',
        'amount' => '₹ 5,000 – ₹ 8 Lacs',
        'tickets' => [
        'KL912880','KL942091','KL849870','KL910108',
        'KL477633','KL979490','KL799905','KL963998',
        'KL898327','KL273645','KL981663','KL955283',
        'KL362745','KL977092','KL677372','KL968864',
        'KL830870','KL154463','KL902972','KL882540'
        ],
        'bg' => 'blue-100',
        'color' => 'blue-600'
        ])
    </div>
    <!-- Footer -->
    <footer class="bg-indigo-600 text-white text-center py-3 mt-3">
        <p class="text-sm">&copy; {{ date('Y') }} Kerala Lottery. All rights reserved.</p>
        <!-- <p class="text-xs">Designed & Developed by <span class="font-semibold">YourCompany</span></p> -->
    </footer>
</body>

</html>