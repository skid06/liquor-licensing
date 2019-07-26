@component('mail::message')
# Congratulation! Your application has been processed.


@component('mail::button', ['url' => config('app.url').'/applications/processed'])
View Processed Applications
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
