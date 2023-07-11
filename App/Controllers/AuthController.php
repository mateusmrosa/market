<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Firebase\JWT\JWT;

use App\Entities\User;
use App\Models\UserModel;

class AuthController
{
    public function login(array $data, Response $response)
    {
        $userModel = new UserModel();
        $user = new User();

        $user->setEmail($data['email']);
        $user->setPassword($data['password']);

        $users = $userModel->get($user);

        if (empty($users) || !password_verify($data['password'], $users[0]['password'])) {
            return false;
        } else {

            $expiredAt = (new \DateTime())
                ->modify('+2 days')
                ->format('Y-m-d H:i:s');

            $tokenPayload = [
                'sub' => $users[0]['id'],
                'email' => $users[0]['email'],
                'expired_at' => $expiredAt
            ];

            $key = 'devfullstackphp';
            $jwt = JWT::encode($tokenPayload, $key, 'HS256');

            $refreshTokenPayload = [
                'email' => $users[0]['email']
            ];

            $refreshToken = JWT::encode($refreshTokenPayload, $key, 'HS256');

            return $response->withJson([
                "token" => $jwt,
                "refreshToken" => $refreshToken
            ]);
        }
    }
}
