<x-app-layout>
    @section('title', __('LIVING DIAGNOSIS OF INTEREST') )
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LIVING DIAGNOSIS OF INTEREST') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @livewire('start-session',['xpath' => 'eid'])
            
            <x-section-border />

            @livewire('test')

            
        </div>
    </div>
    
</x-app-layout>