<?php

use core\Authenticator;

(new Authenticator)->signout();

header('location: /');
exit();