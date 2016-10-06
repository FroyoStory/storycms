<?php


class FrontCommentTest extends TestCase
{
    protected function faker()
    {
        \App\Comment::create([
            'post_id'      => 1,
            'user_id'      => 1,
            'comment'      => 'Helloooooo this is test',
            'status'       => 'published',
        ]);
        \App\Comment::create([
            'post_id'      => 1,
            'user_id'      => 1,
            'comment'      => 'testing',
            'status'       => 'published',
        ]);
    }

    public function testNotLogonComment()
    {
        factory(\App\Post::class, 1)->create();
        $post = \App\Post::find(1);

        $this->visit('/blog/'.$post->slug);

        $this->see('Please login to comment');
    }

    public function testNoComment()
    {
        $post = factory(\App\Post::class)->create();

        $user = factory(\App\User::class)->create();

        $this->actingAs($user);
        $this->visit('/blog/'.$post->slug);

        $this->see('Please leave a comment');
        $this->type('', 'comment');
        $this->press('Send a comment');

        $this->seePageIs('/blog/'.$post->slug);
    }

    public function testLogonComment()
    {
        $post = factory(\App\Post::class)->create();
        $user = factory(\App\User::class)->create();

        $this->actingAs($user);
        $this->visit('/blog/'.$post->slug);

        $this->see('Please leave a comment');
        $this->type('Comment inserted', 'comment');
        $this->press('Send a comment');

        $this->seePageIs('/blog/'.$post->slug);
        $this->seeInDatabase('comments', [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment' => 'Comment inserted'
        ]);
    }

    public function testSeeComment()
    {
        factory(\App\Post::class, 1)->create();
        $post = \App\Post::find(1);
        $user = factory(\App\User::class)->create();
        $this->faker();

        $this->actingAs($user);
        $this->visit('/blog/'.$post->slug);

        $this->see('Helloooooo this is test');
    }
}
