@extends('layouts.email')

@php
  $style = config()->get('mail.styles');
@endphp

@section('title')
  Silakan konfirmasi alamat emailmu!
@stop

@section('intro')
  <p style="{{ $style['paragraph'] }}">
    Hi, {{ $user->name }} <{{ $user->email }}>!
  </p>
  <p style="{{ $style['paragraph'] }}">
    Kamu telah mendaftar. Untuk memastikan bahwa ini merupakan email kamu, silakan masukkan Kode Konfirmasi : <b>{{ $user->confirm_token }}</b> pada halaman konfirmasi atau klik link dibawah ini untuk mulai menggunakan layanan kami
  </p>

  {!! emailButton('Confirm email', url('/auth/confirm/'.$user->confirm_token)) !!}
@stop

@section('content')
  <p style="{{ $style['paragraph'] }}">
    Jika kamu tidak mendaftar, harap abaikan email ini.
  </p>
@stop
