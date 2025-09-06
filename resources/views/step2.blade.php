@extends('layouts.app')

@section('content')
<!-- About Section -->
<div class="p-8 text-center">
    <h1 class="text-3xl font-bold text-gray-800">Dear Customer</h1>
    <p class="mt-2 text-gray-600">Please Find the Company Account Details Below</p>
</div>

<!-- Bank Details Section -->
<div class="max-w-lg mx-auto mt-8 bg-white rounded-2xl shadow-lg p-6">
    <!-- <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">💳 Payment Details</h2>
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center relative">
    💳 Payment Details
    <span class="block w-24 h-1 bg-indigo-600 mx-auto mt-2 rounded-full"></span>
</h2>
<h2 class="text-3xl font-extrabold text-transparent bg-clip-text 
           bg-gradient-to-r from-indigo-600 to-green-600 mb-6 text-center">
    💳 Payment Details
</h2> -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
        <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full shadow">
            💳 Payment Details
        </span>
    </h2>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-sm">
        <ul class="divide-y divide-gray-200 text-gray-700">
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>🏦 Bank Name:</strong></span>
                <span>{{ appSettings()?->bank ?? "" }}</span>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>👤 Account Holder:</strong></span>
                <span>{{ appSettings()?->account_holder ?? "" }}</span>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>💳 Account Number:</strong></span>
                <div class="flex items-center gap-2">
                    <span>{{ appSettings()?->account_number ?? "" }}</span>
                    <button
                        onclick="navigator.clipboard.writeText('{{ appSettings()?->account_number }}').then(() => alert('✅ Account number copied!'))"
                        class="text-xs bg-indigo-600 text-white px-2 py-1 rounded hover:bg-indigo-700 transition">
                        Copy
                    </button>
                </div>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>🏷 IFSC Code:</strong></span>
                <span>{{ appSettings()?->neft_details ?? "" }}</span>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>📍 Branch:</strong></span>
                <span>{{ appSettings()?->branch ?? "" }}</span>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>📱 GPay:</strong></span>
                <span>{{ appSettings()?->gpay ?? "" }}</span>
            </li>
            <li class="flex justify-between items-center px-4 py-3">
                <span><strong>📱 Paytm:</strong></span>
                <span>{{ appSettings()?->paytm ?? "" }}</span>
            </li>
        </ul>
    </div>
@php
//dd(appSettings())
@endphp

    <p class="mt-6 text-center text-sm text-gray-600 bg-yellow-50 border border-yellow-200 rounded-lg p-3">
        ⚠️ In Case of any Payment Related Issues Please Contact our<br>
        <strong>Helpline Number:</strong>
        <span class="text-blue-600 font-medium">{{ appSettings()?->helpline_number }}</span>
    </p>



    <!-- <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">🏦 Bank Details</h2> -->

    <!-- <ul class="space-y-3 text-gray-700">
        <li><strong>Bank Name:</strong> {{ appSettings()?->bank??"" }}</li>
        <li><strong>Account Holder:</strong> {{ appSettings()?->account_holder??"" }}</li>
        <li><strong>Account Number:</strong> {{ appSettings()?->account_number??"" }}</li>
        <li><strong>IFSC Code:</strong> {{ appSettings()?->neft_details??"" }}</li>
        <li><strong>Branch:</strong> {{ appSettings()?->branch??"" }}</li>
        <li><strong>Gpay:</strong> {{ appSettings()?->gpay??"" }}</li>
        <li><strong>Paytm:</strong> {{ appSettings()?->paytm??"" }}</li>
    </ul> -->



    <!-- <div class="mt-6 text-center">
        <button
            onclick="navigator.clipboard.writeText('{{ appSettings()?->account_number }}').then(() => { 
        alert('Account number copied!'); 
    })"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            Copy Account Number
        </button>

    </div> -->
</div>
@endsection