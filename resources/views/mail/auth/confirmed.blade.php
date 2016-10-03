@extends('layouts.email')

@php
  $style = config()->get('mail.styles');
@endphp

@section('intro')
  <p style="{{ $style['paragraph'] }}">
    Hi, {{ $user->name }} <{{ $user->email }}>!
  </p>
  <p style="{{ $style['paragraph'] }}">
    Terima kasih telah mendaftar
  </p>
@stop

@section('content')
  <p style="{{ $style['paragraph'] }}">

  </p>
@stop
