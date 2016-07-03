<?php


namespace future\Transformers;


use future\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id' => $user->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'role_id'=> $user->role_id,
            'created_at'=> $user->created_at,
        ];
    }

}