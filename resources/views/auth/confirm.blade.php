@extends('layouts.blank')

@section('title', 'Register')

@section('content')
  <div class="gh-flow">
    <div class="gh-flow-content-wrap">
      <section class="gh-flow-content">
        <p>Please confirm your email address.</p>
        <p>Don't see email confirmation? Please fill this form to resend your confirmation.</p>
        <form accept="utf-8" action="/auth/resend" method="POST">
          {{ csrf_field() }}
          <input type="email" name="email" placeholder="Your email address">
          <button type="submit" class="btn btn-blue">Click here to resend</button>
        </form>
      </section>
    </div>
  </div>
@stop
