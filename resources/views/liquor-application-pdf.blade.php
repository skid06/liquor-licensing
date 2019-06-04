@extends('vuetify-layout.app')

@section('content')
  <liquor-application-pdf pdf="{{ $data }}" />

@endsection