<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-3 flex justify-between">
        <div class="font-bold text-lg">🎟️ MegaJackpot</div>
        <div class="space-x-6">
            <a href="{{ route('customer.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('customer.about') }}" class="hover:underline">About</a>
        </div>
    </nav>

    <!-- About Section -->
    <div class="p-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800">About MegaJackpot</h1>
        <p class="mt-2 text-gray-600">MegaJackpot is a fun way to test your luck with tickets. 
            Enter your registered mobile number and ticket number to see your status.</p>
    </div>

    <!-- Bank Details Section -->
    <div class="max-w-lg mx-auto mt-8 bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">🏦 Bank Details</h2>
        
        <ul class="space-y-3 text-gray-700">
            <li><strong>Bank Name:</strong> State Bank of India</li>
            <li><strong>Account Holder:</strong> MegaJackpot Pvt. Ltd.</li>
            <li><strong>Account Number:</strong> 123456789012</li>
            <li><strong>IFSC Code:</strong> SBIN0001234</li>
            <li><strong>Branch:</strong> Connaught Place, New Delhi</li>
        </ul>

        <div class="mt-6 text-center">
            <button onclick="navigator.clipboard.writeText('123456789012')" 
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Copy Account Number
            </button>
        </div>
    </div>

</body>
</html>
