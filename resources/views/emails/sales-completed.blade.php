    {{ $applicant_name }} {{ __('Has shared with you its results of:') }} {{ __($tool) }}

    <br>
    {{ __('You can access your results:') }} {{ env('APP_URL') }}/result/{{ $session }}