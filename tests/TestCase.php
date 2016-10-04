<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use DatabaseMigrations;
    use MailTracking;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function admin()
    {
        $admin = User::create([
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('password'),
            'name'          => 'Admin',
            'confirm_token' => str_random(32),
        ]);

        $this->be($admin);
    }
}
