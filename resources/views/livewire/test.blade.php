<div>
    @if ($timeSetted != null)
        <x-form-section submit="save" id="sales-data">
            <x-slot name="title">
                {{ __('Starting Tracking') }}
            </x-slot>
        
            <x-slot name="description">
                {{ __('Once you reach 100%, indicate the email address of your representative and the institution where you study.') }}

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="mt-6 sticky top-0">
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-blue-700 dark:text-white">{{ __('Progress') }}</span>
                        <span class="text-sm font-medium text-blue-700 dark:text-white">{{ round(($questionsBag->count() / $questions->count()) * 100) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width:{{ ($questionsBag->count() / $questions->count()) * 100 }}%"></div>
                    </div>
                </div>
                <div style="height: 20px"></div>
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_email_parent" value="{{ __('Parent email address') }}" />
                    <x-input wire:model="floating_email_parent" name="floating_email_parent" id="floating_email_parent" type="email" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_email_parent" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_email_institution" value="{{ __('Institution email address') }}" />
                    <x-input wire:model="floating_email_institution" name="floating_email_institution" id="floating_email_institution" type="email" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_email_institution" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_first_name" value="{{ __('Parent first name') }}" />
                    <x-input wire:model="floating_first_name" name="floating_first_name" id="floating_first_name" type="text" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_first_name" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_last_name" value="{{ __('Parent last name') }}" />
                    <x-input wire:model="floating_last_name" name="floating_last_name" id="floating_last_name" type="text" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_last_name" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_phone" value="{{ __('Parent phone number') }}" />
                    <x-input wire:model="floating_phone" name="floating_phone" id="floating_phone" type="text" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_phone" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 group">
                    <x-label for="floating_company" value="{{ __('Institution') }} (Ex. AMEN. INC)" />
                    <x-input wire:model="floating_company" name="floating_company" id="floating_company" type="text" class="block py-2.5 px-0 w-full" required />
                    <x-input-error for="floating_company" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                    @if ( round(($questionsBag->count() / $questions->count()) * 100) == 100 OR env('TEST_MODE') == true )
                        <x-button>
                            {{ __('Process') }}
                        </x-button>
                    @else
                        <h2 class="block font-medium text-base text-gray-700">{{ __('You must complete the test!!!') }}</h2>
                    @endif
            </x-slot>
        </x-form-section>
    
        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        @if ($xpath == 'ipv')
            carga de test
        @endif

        @if ($xpath == 'eid')
            @foreach($questions as $question)
        
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                {{ __($question->question) }}
                </div>
                <div x-data="{ buttonDisabled: false }" class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    
                    <span :class="buttonDisabled ? 'bg-gray-300 text-gray-600 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300' : 'bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300'">{{ __('Question') }}: {{ $question->id }} </span>
                    &nbsp;&nbsp;

                    <x-button-response-test wire:click="callActionAnswer( true , {{ $question->id }} )" x-on:click="buttonDisabled = true" x-bind:disabled="buttonDisabled">
                        {{ __('YES') }}
                    </x-button-response-test>
                    &nbsp;&nbsp;

                    <x-button-response-test wire:click="callActionAnswer( false , {{ $question->id }} )" x-on:click="buttonDisabled = true" x-bind:disabled="buttonDisabled">
                        {{ __('NO') }}
                    </x-button-response-test>

                </div>
                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
            @endforeach
        @endif
        <a href="#sales-data">{{ __('Go top') }}</a>
    @endif

</div>
