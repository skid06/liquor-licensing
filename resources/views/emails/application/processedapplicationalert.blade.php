@component('mail::message')
# Congratulation! Your application has been processed.

@component('mail::panel')
There is a new Application ready to be processed now.  
@endcomponent

@component('mail::button', ['url' => config('app.url').'/applications/processed'])
View Processed Applications
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
