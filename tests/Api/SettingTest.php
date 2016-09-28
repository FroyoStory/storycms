<?php

class SettingTest extends TestCase
{
    protected function setting()
    {
        return new \App\Repositories\SettingRepository;
    }

    public function testCreate()
    {
        $this->setting()->create('facebook', 'https://facebook.com/froyo', 'blog');

        $this->seeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo',
            'type'  => 'blog',
        ]);

        $this->setting()->create('ablah', 'https://facebook.com/froyo', 'blog');

        $this->notSeeInDatabase('settings', [
            'key'   => 'ablah',
            'value' => 'https://facebook.com/froyo',
            'type'  => 'blog',
        ]);

    }

    public function testGet()
    {
        $this->setting()->create('facebook', 'https://facebook.com/froyo', 'blog');
        $this->setting()->create('twitter', 'https://twitter.com/froyo', 'blog');

        $this->assertEquals('facebook', $this->setting()->facebook->key);

        $this->assertTrue($this->setting()->facebook instanceof \App\Setting);
        // $this->assertInstanceOf(InvalidArgumentException::class, $this->setting()->theme);
    }

    public function testSet()
    {
        $this->setting()->create('facebook', 'https://facebook.com/froyo', 'blog');
        $this->setting()->create('twitter', 'https://twitter.com/froyo', 'blog');

        $this->setting()->facebook = 'https://facebook.com/froyo-story';

        $this->seeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo-story',
            'type'  => 'blog',
        ]);

        $this->notSeeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo',
            'type'  => 'blog',
        ]);
    }

    public function testCreateSettingFromWeb()
    {
        $response = $this->call('POST', '/api/settings', [
            'facebook' => 'https://facebook.com/froyo',
            'twitter'  => 'https://twitter.com/froyo',
        ]);

        $this->assertEquals(200, $response->status());

        $this->seeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo',
        ]);
        $this->seeInDatabase('settings', [
            'key'   => 'twitter',
            'value' => 'https://twitter.com/froyo',
        ]);

        $response = $this->call('POST', '/api/settings', [
            'facebook' => 'https://facebook.com/froyo-story',
            'twitter'  => 'https://twitter.com/froyo-story',
        ]);

        $this->notSeeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo',
        ]);
        $this->notSeeInDatabase('settings', [
            'key'   => 'twitter',
            'value' => 'https://twitter.com/froyo',
        ]);

        $this->seeInDatabase('settings', [
            'key'   => 'facebook',
            'value' => 'https://facebook.com/froyo-story',
        ]);
        $this->seeInDatabase('settings', [
            'key'   => 'twitter',
            'value' => 'https://twitter.com/froyo-story',
        ]);
    }
}
