@extends('layouts.app')

@section('content')
<!-- Winner Card -->
<div class="max-w-lg mx-auto mt-12 bg-white shadow-2xl rounded-2xl border border-yellow-400 p-8 text-center">
    <!-- Title -->
    <h1 class="text-2xl font-extrabold text-green-600">🎉 Congratulations 🎉</h1>

    <!-- Winner Name -->

    <!-- Load GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <p class="mt-4 text-3xl font-extrabold text-red-700">
        <span id="customerName" class="uppercase">
            {{ $customer->name }}
        </span>
    </p>

    <script>
        gsap.to("#customerName", {
            opacity: 0, // fade out
            duration: 0.5, // half a second
            repeat: -1, // infinite
            yoyo: true, // fade back in
            ease: "power1.inOut" // smooth easing
        });
    </script>


    <!-- Prize -->
    <p class="mt-2 text-lg text-gray-700">
        You have won the
        <span class="font-semibold text-red-600">Consolidated Prize</span>
        for
    </p>
    <p class="text-2xl font-extrabold text-indigo-700 mt-1">
        ₹ {{ number_format($customer->amount??00, 2) }} /-
    </p>

    <!-- Ticket Info -->
    <div class="mt-6 bg-gray-50 border rounded-xl p-4 text-center space-y-2">
        <p><strong>🎟 Ticket No:</strong> {{ $customer->ticket_no }}</p>
        <p><strong>📅 Draw Date:</strong> {{ \Carbon\Carbon::parse($customer->draw_date)->format('d-m-Y') }}</p>
    </div>

    <!-- Contact -->

    <div class="mt-8 bg-white shadow-lg rounded-xl p-6 border border-gray-200">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">

            <!-- Helpline -->
            <p class="text-gray-700 flex items-center gap-2">
                <span class="text-xl">📞</span>
                <span><strong>Helpline:</strong>
                    <span class="text-blue-600 font-medium">{{ appSettings()?->helpline_number }}</span>
                </span>
            </p>

            <!-- Track Button -->
            <button
                class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">
                Track
            </button>

            <!-- WhatsApp -->
            <p class="text-gray-700 flex items-center gap-2">
                <!-- WhatsApp SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-green-500"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .5C5.65.5.5 5.65.5 12c0 2.11.55 4.17 1.59 5.98L.5 23.5l5.7-1.56C7.94 23 9.95 23.5 12 23.5c6.35 0 11.5-5.15 11.5-11.5S18.35.5 12 .5zm0 20.7c-1.82 0-3.59-.49-5.13-1.42l-.37-.22-3.39.93.9-3.31-.24-.38C3.61 15.33 3.1 13.7 3.1 12c0-4.91 4-8.9 8.9-8.9s8.9 4 8.9 8.9-4 8.9-8.9 8.9zm4.77-6.57c-.26-.13-1.53-.75-1.77-.84-.24-.09-.42-.13-.6.13-.18.26-.69.84-.84 1.01-.15.17-.31.19-.57.06-.26-.13-1.1-.41-2.1-1.31-.78-.69-1.31-1.53-1.46-1.79-.15-.26-.02-.4.11-.53.11-.11.26-.29.39-.44.13-.15.17-.26.26-.43.09-.17.04-.32-.02-.45-.06-.13-.6-1.45-.82-1.99-.22-.53-.44-.46-.6-.47-.15-.01-.32-.01-.49-.01-.17 0-.45.06-.69.32-.24.26-.91.89-.91 2.18s.93 2.53 1.06 2.7c.13.17 1.83 2.8 4.44 3.93.62.27 1.1.43 1.48.55.62.2 1.19.17 1.64.1.5-.07 1.53-.62 1.74-1.21.22-.6.22-1.11.15-1.21-.06-.1-.24-.17-.5-.3z" />
                </svg>

                <span><strong>WhatsApp:</strong>
                    <a href="https://wa.me/{{ appSettings()?->helpline_number }}"
                        target="_blank"
                        class="text-green-600 font-medium hover:underline">
                        {{ appSettings()?->helpline_number }}
                    </a>
                </span>
            </p>
        </div>
    </div>


</div>
@endsection
<!-- Alpine.js CDN (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>



<div x-data="{ open: false }" class="inline-block">
    <!-- Track Button -->
    <button @click="open = true"
        class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">
        Track
    </button>

    <!-- Modal -->
    <div x-show="open" x-transition.opacity
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div @click.away="open = false"
             class="bg-white rounded-lg shadow-xl w-96 p-6 space-y-4">

            <h2 class="text-xl font-bold text-gray-800 text-center mb-4">💳 Payment Tracker</h2>

            @php
                $statuses = [
                    0 => ['label' => 'Payment Pending', 'desc' => 'Payment is pending. Please complete the required steps.'],
                    1 => ['label' => 'Payment Transfer', 'desc' => 'Your payment is being processed and will be transferred shortly.'],
                    2 => ['label' => 'Transaction Successful', 'desc' => 'Payment has been successfully completed.'],
                ];
            @endphp

            <div class="mt-4 space-y-6">
                @foreach($statuses as $key => $status)
                    @php
                        $isDone = $key < $customer->status;       // completed steps
                        $isCurrent = $key == $customer->status;   // current step
                    @endphp

                    <div class="flex items-start space-x-4">
                        <!-- Circle + vertical line -->
                        <div class="flex flex-col items-center">
                            <div class="w-6 h-6 rounded-full
                                {{ $isDone ? 'bg-green-600' : ($isCurrent ? 'bg-blue-600' : 'bg-gray-300') }}">
                            </div>
                            @if(!$loop->last)
                                <div class="flex-1 w-1 {{ $isDone ? 'bg-green-600' : 'bg-gray-300' }}"></div>
                            @endif
                        </div>

                        <!-- Text -->
                        <div class="flex-1">
                            <p class="font-semibold {{ $isCurrent ? 'text-blue-600' : ($isDone ? 'text-green-600' : 'text-gray-700') }}">
                                {{ $status['label'] }}
                            </p>
                            <p class="text-gray-600 text-sm">{{ $status['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Close Button -->
            <div class="text-right mt-4">
                <button @click="open = false"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
