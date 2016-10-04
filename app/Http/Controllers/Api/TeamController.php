<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Responder;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $user = User::paginate();

       return $user ? Responder::success($user) : Responder::error();
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'password'          => $request->input('password'),
            'role'              => $request->input('role'),
            // 'location'          => '',
            // 'website'           => '',
            // 'facebook_profile'  => '',
            // 'twitter_profile'   => '',
            // 'bio'               => '',
            // 'accessibility'     => '',
            // 'status'            => '',
            // 'language'          => '',
            'visibility'        => $request->input('visibility') ? 'public' : 'private',
            // 'meta_title'        => '',
            // 'meta_description'  => '',
            'confirm_token'     => str_random(32),
            // 'confirm_at'        => '',
            // 'updated_at'        => '',
            // 'created_by'        => '',
            // 'updated_by'        => ''
        ]);

        return $user ? Responder::success($user) : Responder::error();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name                = $request->input('name');
        $user->email               = $request->input('email');
        $user->password            = $request->input('password');
        $user->location            = $request->input('location');
        $user->website             = $request->input('website');
        //$user->facebook_profile    = $request->input('facebook_profile');
        //$user->twitter_profile     = $request->input('twitter_profile');
        $user->bio                 = $request->input('bio');
        $user->status              = $request->input('status');
        $user->visibility          = $request->input('visibility') ? 'public' : 'private';
        //$user->language            = $request->input('language');
        //$user->meta_title          = $request->input('meta_title');
        //$user->meta_description    = $request->input('meta_description');
        //$user->confirm_at          = $request->input('confirm_at');
        //$user->updated_at          = $request->input('updated_at');
        //$user->created_by          = $request->input('created_by');
        //$user->updated_by          = $request->input('updated_by');

        return $user->save() ? Responder::success($user) : Responder::error();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return Responder::success($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        return $user->delete() ? Responder::success('OK') : Responder::error();
    }
}
