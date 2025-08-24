<?php

use core\App;
use core\Authenticator;
use Core\Database;
use core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('Location: /login');
    exit();
} else {
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    (new Authenticator)->signin([
        'email' => $email,
    ]);

    header('Location: /');
    exit();
}


