<?php

namespace App\GraphQL\Mutation;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;    

class UpdateUserPasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserPassword'
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function rules(array $args = [])
    {
        return [
            'id' => ['required'],
            'email' => ['required', 'email']
        ];
    }

    public function validationErrorMessages ($args = []) 
    {
        return [
            'name.required' => 'Please enter your full name',
            'name.string' => 'Your name must be a valid string',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'Sorry, this email address is already in use',                     
        ];
    }

    public function resolve($root, $args)
    {
        $user = User::find($args['id']);
        if(!$user) {
            return null;
        }

        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}