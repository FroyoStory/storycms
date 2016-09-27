@extends('layouts.blank')

@section('content')
	<div class="gh-flow">
		<div class="gh-flow-content-wrap">
			<section class="gh-flow-content">
				<form class="gh-signin" action="" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<span class="input-icon icon-mail">
							<input type="text" name="name" class="email gh-input" placeholder="Name">
						</span>
					</div>
					<div class="form-group">
						<span class="input-icon icon-mail">
							<input type="email" name="email" class="email gh-input" placeholder="Email address">
						</span>
					</div>
					<div class="form-group">
						<span class="input-icon icon-lock">
							<input type="password" name="password" class="password gh-input" placeholder="Password">
						</span>
					</div>
					<div class="form-group">
						<span class="input-icon icon-lock">
							<input type="password" name="password_confirmation" class="password gh-input" placeholder="Password confirmation">
						</span>
					</div>
					<button id="ember590" type="submit" tabindex="3" class="login btn btn-blue btn-block ember-view">Register</button>
				</form>
			</section>
		</div>
	</div>
@stop
