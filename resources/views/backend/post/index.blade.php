@extends('layouts.backend')

@section('content')
	<div class="ember-view gh-view content-view-container">
		<header class="view-header">
			<h2 class="ember-view view-title">
				<span>Posts</span>
			</h2>
			<section class="view-actions">
		        <a id="ember2641" href="/ghost/editor/" title="New Post" class="btn btn-green ember-view">New Post</a>
		    </section>
		</header>

		<div class="view-container">
			<section class="content-list js-content-list">
				<section class="ember-view content-list-content js-content-scrollbox">
					<ol class="posts-list">
						<li class="ember-view active">
							<a href="" class="permalink ember-view active">
								<h3 class="entry-title">Welcome to Ghost</h3>
								<section class="entry-meta">
	                                <span class="avatar" style="background-image: url(//www.gravatar.com/avatar/843844374229f72277c189a7410327cf?s=250&amp;d=mm&amp;r=x)">
	                                    <img src="//www.gravatar.com/avatar/843844374229f72277c189a7410327cf?s=250&amp;d=mm&amp;r=x" title="Purwandi">
	                                </span>
	                                <span class="author">Purwandi</span>
	                                <span class="status">
	                                    <span class="draft">Draft</span>
	                                </span>
								</section>
							</a>
						</li>
						<li id="ember2655" class="ember-view">
							<a id="ember2656" href="/ghost/1/" title="Edit this post" class="permalink ember-view">
								<h3 class="entry-title">Welcome to Ghost</h3>
                           		<section class="entry-meta">
                                	<span class="avatar" style="background-image: url(//www.gravatar.com/avatar/843844374229f72277c189a7410327cf?s=250&amp;d=mm&amp;r=x)">
                                    	<img src="//www.gravatar.com/avatar/843844374229f72277c189a7410327cf?s=250&amp;d=mm&amp;r=x" title="Purwandi">
	                                </span>
                                	<span class="author">Purwandi</span>
                                	<span class="status">
                                        <time class="date published" datetime="Thu Sep 22 2016 14:34:25 GMT+0000">
                                            Published 8 hours ago
                                        </time>
                                	</span>
    							</section>
							</a>
						</li>
					</ol>
				</section>
			</section>
			<section class="content-preview js-content-preview">
				<section class="post-controls">
    				<a id="ember2659" href="/ghost/editor/4/" title="Edit this post" class="btn btn-minor post-edit ember-view"><i class="icon-edit"></i></a>
				</section>
				<section class="ember-view content-preview-content">
					<div class="wrapper">
						<h1 class="content-preview-title">
							<a id="ember2762" href="/ghost/editor/4/" class="ember-view">Maniak</a>
						</h1>
						<p>Hello</p>
					</div>
				</section>
			</section>
		</div>

	</div>
@stop
