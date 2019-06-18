@extends('vuetify-layout.app')

@section('content')
 <reset-password token="{{ $token }}" email="{{ $email }}" />
@endsection