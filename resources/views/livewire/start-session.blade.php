<x-action-section>
    <x-slot name="title">
        {{ __('Start a Test') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Note that starting a session generates a data trace') }}
    </x-slot>

   
    <x-slot name="content">
        @if (session('status'))
        <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">{{_('Attention')}}</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                {{ _(session('status'))}}
            </div>
            <div class="flex">
                <button type="button" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                </svg>
                View more
                </button>
                <button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                Dismiss
                </button>
            </div>
        </div>
        @endif
        <div class="max-w-2xl text-sm text-gray-600">
            @if ($xpath == 'eid')
            {!! __('instructions.eid') !!}
            @endif

            @if($xpath =='ipv')
            {!! __('instructions.ipv') !!}
            @endif
        </div>

        @if($disable == true AND env('TEST_MODE') == false)
        <div class="mt-3 mb-4 text-sm">
            {{ __('You recently ran the tool. You will have to wait a few months to run the test again.')}}
        </div>
        @else
        <div class="mt-5" x-data="{buttonDisabled: false}">
            <x-button-start-test x-on:click="buttonDisabled = true" x-bind:disabled="buttonDisabled" wire:click="setStart('{{ $xpath }}')">
                {{ __('Start') }}
            </x-button-start-test>
        </div>
        @endif

    </x-slot>
</x-action-section>