<x-app-layout>
    @section('title', __('INVENTORY OF VOCATIONAL PREFERENCES') )
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('INVENTORY OF VOCATIONAL PREFERENCES') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @livewire('start-session',['xpath' => 'ipv'])
            
            <x-section-border />

            @livewire('test')
            
        </div>
    </div>

</x-app-layout>