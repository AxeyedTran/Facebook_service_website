<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'register') {
        $user_token               = htmlspecialchars(addslashes($_POST['user_token']));
        $user_username            = htmlspecialchars(addslashes($_POST['user_username']));
        $user_password            = md5(htmlspecialchars(addslashes($_POST['user_password'])));
        $user_confirm_password    = md5(htmlspecialchars(addslashes($_POST['user_confirm_password'])));
        $user_ip                  = $_SERVER['REMOTE_ADDR'];
        $user_time                = time();
        $check_username_available = mysqli_num_rows(mysqli_query($conn, "SELECT user_id FROM table_user WHERE user_username = '$user_username'"));
        if ($user_password != $user_confirm_password) {
            $return['error'] = 1;
            $return['msg']   = 'Password re-enter field is incorrect.';
            die(json_encode($return));
        } else if (strlen($user_username) > 32 || strlen($user_username) < 5) {
            $return['error'] = 1;
            $return['msg']   = 'The first and last name fields must be at least 6 characters long.';
            die(json_encode($return));
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_username)) {
            $return['error'] = 1;
            $return['msg']   = 'The account field can only contain letters, numbers, and dashes.';
            die(json_encode($return));
        } else if ($check_username_available > 0) {
            $return['error'] = 1;
            $return['msg']   = 'The account field is already in the system.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "INSERT INTO table_user(user_token, user_username, user_password, user_fullname, user_phone, user_email, user_fb, user_point, user_ip, user_level, user_blocked, user_time_last, user_time) 
            VALUES ('$user_token', '$user_username', '$user_password', '', '', '', '4', '0', '$user_ip', '0', '0', '$user_time', '$user_time')")) {
                $user_msg      = '<div class="alert alert-success text-center" role="alert"><strong>Register Successfully.</strong></div>';
                $return['msg'] = 'Register Successfully.';
                die(json_encode($return));
            } else {
                $return['error'] = 1;
                $return['msg']   = 'Something Went Wrong';
                die(json_encode($return));
            }
        }
    }
}
?>