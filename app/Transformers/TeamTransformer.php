<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class TeamTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'                => $user->id,
            'name'              => $user->name,
            'email'             => $user->email,
            //'password'          => $user->password,
            // 'role'              => $user->role,
            //'location'          => $user->location,
            //'website'           => $user->website,
            // 'facebook_profile'  => $user->facebook_profile,
            // 'twitter_profile'   => $user->twitter_profile,
            //'bio'               => $user->bio,
            // 'accessibility'     => $user->accessibility,
            // 'status'            => $user->status,
            // 'language'          => $user->language,
            //'visibility'        => $user->visibility ? 'public' : 'private',
            // 'meta_title'        => $user->meta_title,
            // 'meta_description'  => $user->meta_description,
            // 'confirm_token'     => $user->confirm_token,
            // 'confirm_at'        => $user->confirm_at,
            // 'remember_token'    => $user->remember_token,
            // 'last_login'        => $user->last_login,
            // 'created_at'        => $user->created_at,
            // 'updated_at'        => $user->updated_at,
            // 'created_by'        => $user->created_by,
            // 'updated_by'        => $user->updated_by
        ];
    }
}
