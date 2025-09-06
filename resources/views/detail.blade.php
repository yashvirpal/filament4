<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
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

    <!-- Customer Details -->
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 mx-auto mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">🎟️ Customer Details</h2>

        <ul class="space-y-3 text-gray-700">
            <li><strong>Name:</strong> {{ $customer->name }}</li>
            <li><strong>Mobile:</strong> {{ $customer->mobile }}</li>
            <li><strong>Email:</strong> {{ $customer->email }}</li>
            <li><strong>Ticket No:</strong> {{ $customer->ticket_no }}</li>
            <li>
                <strong>Payment Status:</strong> 
                <span class="px-2 py-1 rounded text-white text-sm
                    {{ $customer->payment_status === 'Paid' ? 'bg-green-500' : 
                       ($customer->payment_status === 'Pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                    {{ $customer->payment_status }}
                </span>
            </li>
        </ul>
    </div>

</body>
</html>
