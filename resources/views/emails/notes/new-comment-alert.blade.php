@component('mail::message')
# New Comment Alert!

@if($note->user_id == null)
  An admin added a note for you

  @component('mail::button', ['url' => env('APP_URL').'/liquor-application/'.$note->application_id])
    View the application's notes
  @endcomponent
@elseif($note->admin_id == null)
  A user added a note for you.

  @component('mail::button', ['url' => url().'/admin/liquor-application/'.$note->application_id])
    View the application's notes
  @endcomponent  
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
