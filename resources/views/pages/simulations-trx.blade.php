<div>
    <x-filament-panels::page>
        <x-filament-panels::form wire:submit="create">
            {{ $this->form }}

            <x-filament-panels::form.actions :actions="$this->getCachedFormActions()" :full-width="$this->hasFullWidthFormActions()" />
        </x-filament-panels::form>
        @json($list)

        <livewire:simulation-detail :list="$list" />

        {{-- @livewire('simulation-detail', ['list' => collect([[]])]) --}}


    </x-filament-panels::page>
</div>
