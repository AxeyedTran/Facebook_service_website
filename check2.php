<?php
require_once '_config.php';
if ($kdh == false) {
    header('location: /auth/register');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
} else {
    header('location: /home');
    die();
}
?>