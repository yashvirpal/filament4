<div class="bumper-prize  rounded-lg shadow mb-8 text-center pb-6">
    <h2 class="text-2xl p-3 bg-{{ $bg ?? 'gray-100' }} font-bold text-{{ $color ?? 'red-600' }} mb-4">
        {{ $title }}: {{ $amount }}
    </h2>
    <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 text-sm font-medium">
        @foreach($tickets as $ticket)
        <li class="text-center">{{ $ticket }}</li>
        @endforeach
    </ul>
</div>