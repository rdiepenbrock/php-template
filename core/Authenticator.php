<?php

namespace core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->signin([
                    'email' => $email,
                ]);

                return true;
            }
        }

        return false;
    }

    public function signin($user): void
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function signout()
    {
        Session::destroy();
    }
}