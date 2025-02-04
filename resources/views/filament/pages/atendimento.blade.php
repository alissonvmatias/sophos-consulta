<x-filament-panels::page>
    <x-filament-panels::form>
        
    <div>
        <form wire:submit="create">
            {{ $this->form }}
            
            <button type="submit">
                Submit
            </button>
        </form>
        
        <x-filament-actions::modals />
    </div>
    </x-filament-panels::form>




</x-filament-panels::page>
