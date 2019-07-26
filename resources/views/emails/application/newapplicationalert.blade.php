@component('mail::message')
# New Application Alert!

@component('mail::panel')
There is a new Application ready to be processed now. 
@endcomponent

@component('mail::button', ['url' => config('app.url').'/admin/liquor-application/'.$application->id])
View Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
