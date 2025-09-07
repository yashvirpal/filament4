@extends('layouts.app')

@section('content')
<!-- Winner Card -->
<div class="max-w-lg mx-auto mt-12 bg-white shadow-2xl rounded-2xl border border-yellow-400 p-8 text-center">

    <div class="flex items-center justify-center space-x-2">
        <span class="text-red-500 text-xl">•</span>
        <span class="text-red-500 font-bold uppercase tracking-wide">Live</span>
        <span class="text-red-500 text-xl">•</span>
    </div>
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
            <!-- <button
                class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">
                Track
            </button> -->
            <!-- Alpine.js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>

            <div x-data="{ open: false }">

                <!-- Track Button -->
                <div class="flex justify-center mb-6">
                    <button @click="open = true"
                        class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-lg hover:bg-indigo-700 transition">
                        Track
                    </button>
                </div>

                <!-- Popup -->
                <div x-show="open" x-transition.opacity
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div @click.away="open = false"
                        class="bg-white rounded-xl shadow-2xl w-full max-w-3xl p-8">

                        <!-- Header -->
                        <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">💳 Payment Tracker</h2>

                        @php
                        $stsdesc=$customer->status_desc;
                        $statuses = [
                        0 => ['label' => 'Payment Debited', 'desc' => 'Payment deducted from Kerala Lottery.'],
                        1 => ['label' => 'Payment Pending', 'desc' => $stsdesc],
                        2 => ['label' => 'Payment Successfull', 'desc' => 'Payment has not been credited to your account yet. Please resolve the above-mentioned problem, after which the payment will be credited to your account.'],
                        ];
                        $currentStatus = $customer->status ?? 0;
                        @endphp

                        <!-- Timeline -->
                        <div class="relative pl-16">
                            @foreach ($statuses as $key => $status)
                            <!-- @php
                            $isActive = $key <= $currentStatus;
                                $circleColor=$isActive ? 'bg-green-600 text-white' : 'bg-gray-300 text-gray-600' ;

                                if ($currentStatus==2) {
                                $descBox='border-green-600 text-green-600' ;
                                } elseif ($key==$currentStatus) {
                                $descBox='border-red-600 text-red-600 bg-red-50' ;
                                } else {
                                $descBox='border-gray-300 text-gray-500' ;
                                }
                                @endphp -->
                            @php
                            $emtpydesc=true;
                            if ($currentStatus == 2) {
                            // ✅ Final success: everything green
                            $circleColor = 'bg-green-600 text-white';
                            $labelColor = 'text-green-600';
                            $descBox = 'border-green-600 text-green-600';
                            $emtpydesc=false;
                            } elseif ($key == $currentStatus) {
                            if ($currentStatus == 1) {
                            $circleColor = 'bg-red-600 text-white';
                            $labelColor = 'text-red-600';
                            $descBox = 'border-red-600 text-red-600 bg-red-50';
                            }else{
                            // 🔴 Current step: red circle + red text + red box

                            $circleColor = 'bg-green-600 text-white';
                            $labelColor = 'text-green-600';
                            $descBox = 'border-green-600 text-green-600';
                            }
                            } elseif ($key < $currentStatus) {
                                // ✅ Completed steps: green
                                $circleColor='bg-green-600 text-white' ;
                                $labelColor='text-green-600' ;
                                $descBox='border-green-600 text-green-600' ;
                                } else {
                                // ⏳ Pending steps: gray
                                $circleColor='bg-gray-300 text-gray-600' ;
                                $labelColor='text-gray-500' ;
                                $descBox='border-gray-300 text-gray-500' ;
                                }
                                @endphp


                                <!-- Step -->
                                <div class="relative pb-12">
                                    <!-- Circle -->
                                    <div class="absolute left-6 -translate-x-1/2 top-0 flex items-center justify-center w-12 h-12 rounded-full {{ $circleColor }} font-bold shadow-md z-10">
                                        {{ $key + 1 }}
                                    </div>

                                    <!-- Connector line (only if not last step) -->
                                    @if ($key < count($statuses) - 1)
                                        <div class="absolute left-6 top-12 -translate-x-1/2 w-1 h-full 
                                {{ $key < $currentStatus ? 'bg-green-600' : 'bg-gray-300' }}">
                                </div>
                                @endif

                                <!-- Text -->
                                <div class="ml-12">
                                    <p class="text-lg font-semibold mb-2">{{ $status['label'] }}</p>
                                    <div class="border3 rounded-lg3 pp-3 {{ $descBoxx??'' }}">
                                        {{ $emtpydesc?$status['desc']:'' }}
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Close Button -->
                    <div class="flex justify-end mt-8">
                        <button @click="open = false"
                            class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>







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
@if(session()->has('customer_id') && !session()->has('alert_shown'))

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<style>
    canvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
    }
</style>

<canvas id="confetti-canvas"></canvas>
<audio id="celebration-sound" src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3"></audio>

<script>
    const canvas = document.getElementById('confetti-canvas');
    const myConfetti = confetti.create(canvas, {
        resize: true,
        useWorker: true
    });
    const sound = document.getElementById("celebration-sound");

    function startCelebration() {
        // Start sound
        sound.currentTime = 0;
        sound.play().catch(() => {
            console.log("Autoplay blocked. Waiting for user interaction.");
        });

        // Fire confetti repeatedly for 3 seconds
        const duration = 3000; // 3 seconds
        const end = Date.now() + duration;

        (function frame() {
            myConfetti({
                particleCount: 5,
                spread: 160,
                origin: {
                    x: Math.random(),
                    y: Math.random() - 0.2
                }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            } else {
                // Stop sound when confetti ends
                sound.pause();
                sound.currentTime = 0;
            }
        })();
    }

    // Try autoplay on page load
    window.addEventListener("load", () => {
        startCelebration();
    });

    // If autoplay blocked, trigger on first click/tap
    document.body.addEventListener("click", () => {
        // if (sound.paused) startCelebration();
    });
</script>
@php
session(['alert_shown' => true]);
@endphp
@endif