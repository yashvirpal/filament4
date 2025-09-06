<x-filament::page>
    {{ $this->form }}

    <div class="mt-6">
        <x-filament::button wire:click="save">
            Save Settings
        </x-filament::button>
    </div>
</x-filament::page>
