@extends('layouts.backend')

@section('content')
	<section class="gh-view">
		<header class="view-header">
			<h2 class="ember-view view-title">
				<button class="gh-mobilemenu-button"></button>
				<span>Team</span>
			</h2>
			<section class="view-actions">
				<button class="btn btn-green">Invite people</button>
			</section>
		</header>
		<section class="ember-view view-content team">
			<section class="user-list active-users">
				<h4 class="user-list-title">Active users</h4>
				<a href="/" class="user-list-item ember-view">
					<span class="user-list-item-figure" style="background-image: url(//www.gravatar.com/avatar/843844374229f72277c189a7410327cf?s=250&amp;d=mm&amp;r=x)">
					    <span class="hidden">Photo of Purwandi</span>
					</span>
					<div class="user-list-item-body">
					    <span class="name">
					        Purwandi
					    </span>
					    <br>
					    <span class="description">Last seen: 16 minutes ago</span>
					</div>
					<aside class="user-list-item-aside">
					    <span class="role-label owner">Owner</span>
					</aside>
				</a>
			</section>
		</section>
	</section>
@stop
