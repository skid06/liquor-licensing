@component('mail::message')
# New Application Alert!

@component('mail::panel')
There is a new Application ready to be processed now. 
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/liquor-application'.$application->id])
View Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
