@component('mail::message')
# Introduction

Thanks so much for registration


@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum doler si amar
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
