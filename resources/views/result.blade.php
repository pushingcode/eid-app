<x-guest-layout>
    <nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="/" class="flex items-center">
                <x-application-mark class="block h-9 w-auto" />
                <span class="pl-4 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ __('Coachteen Vocational Center') }}</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ __('Dashboard') }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ __('Log in') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
            </div>
        </div>
    </nav>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-action-section>
                <x-slot name="title">
                    {{ __($tool) }}
                </x-slot>
                <x-slot name="description">
                    {{ __('This chart shows your interest bias') }}
                    

                    <h3 class="py-3 text-lg font-medium text-gray-900 border-b border-gray-200">{{ __('Vocational Test Data') }}</h3>
                    <ul class="list-inside list-disc">
                        <li>{{ __('User') }}: {{ $user }}</li>
                        <li>{{ __('Age') }}: {{ $age }}</li>
                        <li>{{ __('Date') }}: {{ $date }}</li>
                        <li>{{ __('Language') }}: {{ $lang }}</li>
                        <li>{{ __('Duration') }}: {{ $duration }} min</li>
                        <li>{{ __('Affirmations') }}: {{ $positive }}</li>
                        <li>{{ __('Negations') }}: {{ $negative }}</li>
                    </ul>
                    

                    <div class="hidden sm:block">
                        <div class="py-8">
                            <div class="mb-8 border-t border-gray-200"></div>
                            
                                
                                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">ABC for Life</h5>
                                    <div class="flex items-baseline text-gray-900 dark:text-white">
                                        <span class="text-3xl font-semibold">$</span>
                                        <span class="text-5xl font-extrabold tracking-tight">4.99</span>
                                        <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/Only Payment</span>
                                    </div>
                                    <ul role="list" class="space-y-5 my-7">
                                        <li class="flex space-x-3 items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>
                                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Fully Online</span>
                                        </li>
                                        <li class="flex space-x-3">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>
                                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">At your rhythm</span>
                                        </li>
                                        <li class="flex space-x-3">
                                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                            </svg>
                                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Access to our platform</span>
                                        </li>
                                        
                                    </ul>
                                    <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose plan</button>
                                </div>

                                {{-- more products--}}

                                <button type="button" class="mt-8 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                More Products
                                <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                    3
                                </span>
                                </button>

                        </div>
                    </div>
                    

                </x-slot>
                <x-slot name="content">
                <div style="width: 650px;">
                        <canvas id="ivp"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const cData = JSON.parse(`<?php echo $data; ?>`)
                        console.log(cData)
                        const data = {
                            labels: cData.label,
                            datasets: [{
                                label: 'Result Session {{ $date }}',
                                data: cData.data,
                                fill: true,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgb(255, 99, 132)',
                                pointBackgroundColor: 'rgb(255, 99, 132)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgb(255, 99, 132)'
                            }]
                        };

                        new Chart(
                            document.getElementById('ivp'),
                            {
                                type: 'radar',
                                data: data,
                                options: {
                                    elements: {
                                        line: {
                                            borderWidth: 3
                                        }
                                    }
                                },
                            }
                        );
                        
                    </script>
                </x-slot>
            </x-action-section>
        </div>
    </div>
</x-guest-layout>