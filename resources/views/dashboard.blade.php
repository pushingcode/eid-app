<x-app-layout>
    @section('title', __('Dashboard') )

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($visible == true)
            <x-action-section>
                <x-slot name="title">
                    {{ __('LIVING DIAGNOSIS OF INTEREST') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('This chart shows your interest bias') }}
                    

                    <h3 class="py-3 text-lg font-medium text-gray-900 border-b border-gray-200">{{ __('Vocational Test Data') }}</h3>
                    <ul class="list-inside list-disc">
                        <li>{{ __('Date') }}: {{ $date }}</li>
                        <li>{{ __('Language') }}: {{ $lang }}</li>
                        <li>{{ __('Tool') }}: {{ $tool }}</li>
                        <li>{{ __('Duration') }}: {{ $duration }} min</li>
                        <li>{{ __('Affirmations') }}: {{ $positive }}</li>
                        <li>{{ __('Negations') }}: {{ $negative }}</li>
                    </ul>
                    {{-- compartir data --}}
                    <div x-data="{ text: '{{ url('/result') }}/{{ $session }}', buttonText: '{{ __('Generate URL') }}'  }">
                        <input class="hidden" type="text" x-model="text">
                        <button x-text="buttonText" @click="navigator.clipboard.writeText(text); buttonText = '{{__('Copied!!!')}}'" class="mt-8 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></button>
                    </div>

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
                                    <span class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">ABC for Life development you abilities to increase potential.</span>
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
                                    <a href="https://payments.coachteen.com/process/3777a331-7461-4ffd-907b-a35280160970" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose plan</a>
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
            @endif
            @if ($visible == false)

            <section class="rounded-md bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ __('Discover your potential') }}</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">{{ __('At Coachteen we focus on education, where technology and innovation can generate long-term value and drive the growth of your career goals.') }}</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                        <a href="/eid" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get started
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Learn more
                        </a>  
                    </div>
                </div>
            </section>

            @endif
        </div>
    </div>
</x-app-layout>
