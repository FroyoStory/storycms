<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Driver
    |--------------------------------------------------------------------------
    |
    | Laravel supports both SMTP and PHP's "mail" function as drivers for the
    | sending of e-mail. You may specify which one you're using throughout
    | your application here. By default, Laravel is setup for SMTP mail.
    |
    | Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill",
    |            "ses", "sparkpost", "log"
    |
     */

    'driver'     => env('MAIL_DRIVER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Host Address
    |--------------------------------------------------------------------------
    |
    | Here you may provide the host address of the SMTP server used by your
    | applications. A default option is provided that is compatible with
    | the Mailgun mail service which will provide reliable deliveries.
    |
     */

    'host'       => env('MAIL_HOST', 'smtp.mailgun.org'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Host Port
    |--------------------------------------------------------------------------
    |
    | This is the SMTP port used by your application to deliver e-mails to
    | users of the application. Like the host we have set this value to
    | stay compatible with the Mailgun e-mail application by default.
    |
     */

    'port'       => env('MAIL_PORT', 587),

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
     */

    'from'       => [
        'address' => 'hello@example.com',
        'name'    => 'Example',
    ],

    /*
    |--------------------------------------------------------------------------
    | E-Mail Encryption Protocol
    |--------------------------------------------------------------------------
    |
    | Here you may specify the encryption protocol that should be used when
    | the application send e-mail messages. A sensible default using the
    | transport layer security protocol should provide great security.
    |
     */

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Server Username
    |--------------------------------------------------------------------------
    |
    | If your SMTP server requires a username for authentication, you should
    | set it here. This will get used to authenticate with your server on
    | connection. You may also set the "password" value below this one.
    |
     */

    'username'   => env('MAIL_USERNAME'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Server Password
    |--------------------------------------------------------------------------
    |
    | Here you may set the password required by your SMTP server to send out
    | messages from your application. This will be given to the server on
    | connection so that the application will be able to send messages.
    |
     */

    'password'   => env('MAIL_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Sendmail System Path
    |--------------------------------------------------------------------------
    |
    | When using the "sendmail" driver to send e-mails, we will need to know
    | the path to where Sendmail lives on this server. A default path has
    | been provided here, which will work well on most of your systems.
    |
     */

    'sendmail'   => '/usr/sbin/sendmail -bs',

    /**
    |--------------------------------------------------------------------------
    | MAIL Styles
    |--------------------------------------------------------------------------
     */
    'styles'     => [
        /* Layout ------------------------------ */
        'body'                => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
        'email-wrapper'       => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
        /* Masthead ----------------------- */
        'email-masthead'      => 'padding: 25px 0; text-align: center;',
        'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
        'email-body'          => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
        'email-body_inner'    => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
        'email-body_cell'     => 'padding: 35px;',
        'email-footer'        => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
        'email-footer_cell'   => 'color: #AEAEAE; padding: 35px; text-align: center;',
        /* Body ------------------------------ */
        'body_action'         => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
        'body_sub'            => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
        /* Type ------------------------------ */
        'anchor'              => 'color: #3869D4;',
        'header-1'            => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left; padding-bottom: 15px;',
        'paragraph'           => 'margin-top: 0; color: #545454; font-size: 15px; line-height: 1.5em;',
        'paragraph-sub'       => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
        'paragraph-center'    => 'text-align: center;',
        /* Buttons ------------------------------ */
        'button'              => 'display: block; display: inline-block; width: 200px; min-height: 20px; background-color: #3869D4; border-radius: 3px; color: #ffffff; text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
        'button--normal'      => 'font-size: 15px; line-height: 25px; width: 200px; padding: 10px;',
        'button--small'       => 'font-size: 13px; line-height: 20px; width: 100px; padding: 8px;',
        'button--green'       => 'background-color: #22BC66;',
        'button--red'         => 'background-color: #dc4d2f;',
        'button--blue'        => 'background-color: #3869D4;',
        'button--orange'      => 'background-color: #ff6000;',
        /* Images ------------------------------- */
        'img-responsive'      => 'display: block; max-width: 100%; height: auto;',
        'font-family'         => 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;',
    ],

];
