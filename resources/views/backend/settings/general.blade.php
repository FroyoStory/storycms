@extends('layouts.backend')

@section('content')
	<section class="gh-view">
		<header class="view-header">
			<h2 class="view-title"><span>General</span></h2>
			<section class="view-actions">
				<button class="btn btn-blue">Save</button>
			</section>
		</header>
		<section class="view-content">
			<form>
				<fieldset>
					<div class="form-group">
						<label>Blog Title</label>
						<input type="text" name="general" class="gh-input">
						<p class="response"></p>
						<p>The name of your blog</p>
					</div>
					<div class="description-container form-group">
						<label>Blog description</label>
						<textarea class="gh-input"></textarea>
						<p class="response"></p>
						<p>Describe what your blog is about</p>
					</div>
				</fieldset>
				<fieldset>
					<div class="form-group">
						<label>Post per page</label>
						<input type="text" name="general" class="gh-input">
						<p class="response"></p>
						<p>How many posts should be displayed on each page</p>
					</div>
					<div class="form-group">
						<label>Facebook page</label>
						<input type="text" name="general" class="gh-input">
						<p class="response"></p>
						<p>URL of your blog's Facebook Page</p>
					</div>
					<div class="form-group">
						<label>Twittter page</label>
						<input type="text" name="general" class="gh-input">
						<p class="response"></p>
						<p>URL of your blog's Twitter profile</p>
					</div>
				</fieldset>
				<div class="settings-themes">
					<h3>Themes</h3>
					<div>
						<div class="theme-list">
							<div class="theme-list-item theme-list-item--active"> <!-- theme-list-item--active -->
								<div class="theme-list-item-body">
									<span class="name">Casper</span>
								</div>
								<div class="theme-list-item-aside">
									<a href="" class="theme-list-action">Download</a>
									<span class="theme-list-action theme-list-action-activate">Aktif</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</section>
	</section>
@stop
