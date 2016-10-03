<?php

class AuthLoginTest extends TestCase
{
    public function testVisitPage()
    {
        $this->visit('/signin');
        $this->see('email');
        $this->see('password');
    }

    public function testEmailPasswordEmpty()
    {
        $this->visit('/signin');
        $this->type('', 'email');
        $this->type('', 'password');
        $this->press('Sign in');

        $this->see('The email field is required.');
        $this->see('The password field is required.');
    }

    public function testCredentialsNotValid()
    {
        \App\User::create([
            'name'          => 'Yoobar',
            'email'         => 'yooo@bar.com',
            'password'      => bcrypt('helo'),
            'confirm_token' => str_random(32),
            'confirm_at'    => \Carbon\Carbon::now(),
        ]);

        $this->visit('/signin');
        $this->type('yoo@bar.com', 'email');
        $this->type('pass', 'password');
        $this->press('Sign in');

        $this->see('These credentials do not match our records.');
    }

    public function testUserNotConfirmEmail()
    {
        $user = \App\User::create([
            'name'          => 'Yoobar',
            'email'         => 'yooo@bar.com',
            'password'      => bcrypt('helo'),
            'confirm_token' => str_random(32),
        ]);

        $this->visit('/signin');
        $this->type('yooo@bar.com', 'email');
        $this->type('helo', 'password');
        $this->press('Sign in');

        $this->see('Please confirm your email address.');
        $this->see('Don\'t see email confirmation? Please fill this form to resend your confirmation.');

        $this->type('yooo@bar.com', 'email');
        $this->see('Click here to resend');
        $this->press('Click here to resend');

        $this->seeEmailTo('yooo@bar.com');
        $this->seeEmailSubject('Verify your email');
        $this->seeEmailContains(url('auth/confirm/' . $user->confirm_token));
    }
}
