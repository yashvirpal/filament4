@extends('layouts.app')

@section('content')
<!-- Winner Card -->
<div class="max-w-lg mx-auto mt-12 bg-white shadow-2xl rounded-2xl border border-yellow-400 p-8 text-center">
    <!-- Title -->
    <h1 class="text-3xl font-extrabold text-green-600">🎉 Congratulations 🎉</h1>

    <!-- Winner Name -->
    <p class="mt-4 text-xl font-bold text-gray-800">
        Mr. <span class="uppercase">{{ $customer->name }}</span>
    </p>

    <!-- Prize -->
    <p class="mt-2 text-lg text-gray-700">
        You have won the
        <span class="font-semibold text-red-600">Consolidated Prize</span>
        for
    </p>
    <p class="text-2xl font-extrabold text-indigo-700 mt-1">
        ₹ {{ number_format($customer->prize_amount??1000, 2) }} /-
    </p>

    <!-- Ticket Info -->
    <div class="mt-6 bg-gray-50 border rounded-xl p-4 text-center space-y-2">
        <p><strong>🎟 Ticket No:</strong> {{ $customer->ticket_no }}</p>
        <p><strong>📅 Draw Date:</strong> {{ \Carbon\Carbon::parse($customer->draw_date)->format('d-m-Y') }}</p>
    </div>

    <!-- Contact -->
    <div class="mt-6 flex justify-between">
        <p class="text-gray-700"><strong>📞 Helpline:</strong> <span class="text-blue-600">{{ $customer->helpline??123456789 }}</span></p>
        <p class="text-gray-700"><strong>💬 WhatsApp:</strong> <span class="text-green-600">{{ $customer->whatsapp?? 1234432123 }}</span></p>
    </div>

</div>
@endsection