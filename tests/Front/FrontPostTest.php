<?php

class FrontPostTest extends TestCase
{

    protected function faker()
    {
        \App\Category::create(['name' => 'Inspirasi', 'slug' => 'inspirasi']);
        \App\Category::create(['name' => 'Acara dan Promosi', 'slug' => 'acara-dan-promosi']);

        \App\Post::create(['title' => 'Selamat Bro', 'markdown' => 'Hello markdown', 'html' => 'Hello markdown']);
        \App\Post::create(['title' => 'Mendapatkan Bro', 'markdown' => 'Simple text test', 'html' => 'Simple text test']);
    }

    public function testPostList()
    {
        $this->faker();
        $this->visit('/blog');

        $this->see('Selamat Bro');
        $this->see('Hello markdown');

        $this->see('Mendapatkan Bro');
        $this->see('Simple text test');
    }

    public function testClickPost()
    {
        $this->faker();
        $this->visit('/blog');

        $this->click('Selamat Bro');
        $this->seePageIs('/blog/selamat-bro');
        $this->see('Selamat Bro');
        $this->see('Hello markdown');

    }
}
