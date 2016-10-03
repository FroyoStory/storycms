<?php

class AuthRegisterTest extends TestCase
{
    public function testRegisterIsDisabled()
    {
        // disable register
        config()->set('froyo.user.allow_signup', false);
        $this->visit('register');
        $this->see('The page you are looking is not found.');
    }

    public function testSendFormOnDisabledPage()
    {
        config()->set('froyo.user.allow_signup', false);
        $this->call('POST', 'register', [
            'name'                  => 'Foobar',
            'email'                 => 'foobar@froyo.co.id',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertEquals(404, $this->response->status());
    }

    public function testRegisterInvalidField()
    {
        $this->visit('register');
        $this->see('Register');
        $this->type('Foobar', 'name');
        $this->type('foobar@froyo.co.id', 'email');
        $this->type('password', 'password');
        $this->type('', 'password_confirmation');
        $this->press('Register');
        $this->see('The password confirmation does not match.');

        $this->type('', 'name');
        $this->type('', 'email');
        $this->type('password', 'password');
        $this->type('password', 'password_confirmation');
        $this->press('Register');
        $this->see('The name field is required.');
        $this->see('The email field is required.');

        $this->type('Foobar', 'name');
        $this->type('foo..xom', 'email');
        $this->type('password', 'password');
        $this->type('password', 'password_confirmation');
        $this->press('Register');
        $this->see('The email must be a valid email address.');
    }

    public function testRegister()
    {
        $this->visit('register');
        $this->see('Register');
        $this->type('Foobar', 'name');
        $this->type('foobar@froyo.co.id', 'email');
        $this->type('password', 'password');
        $this->type('password', 'password_confirmation');
        $this->press('Register');

        $this->seePageIs('register-success');
        $this->see('Thanks for signup, please verify your email address.');

        $user = \App\User::orderBy('created_at', 'desc')->first();

        $this->seeEmailTo('foobar@froyo.co.id');
        $this->seeEmailSubject('Verify your email');
        $this->seeEmailContains(url('auth/confirm/' . $user->confirm_token));
    }

    public function testEmailConfirmation()
    {
        $user = \App\User::create([
            'name'          => 'Foobar',
            'email'         => 'foobar@froyo.co.id',
            'password'      => bcrypt('password'),
            'confirm_token' => '2873274732dwdewdew',
        ]);

        $this->visit('/auth/confirm/' . $user->confirm_token);
        $this->seePageIs('/');
        $this->assertEquals($user->id, Auth::user()->id);

        $this->seeEmailTo('foobar@froyo.co.id');
        $this->seeEmailSubject('Thanks for signup');
        $this->seeEmailContains('Terima kasih telah mendaftar');

        // LOGOUT
        Auth::logout();
        $this->visit('/auth/confirm/' . $user->confirm_token);
        $this->see('Be right back');

    }

}
