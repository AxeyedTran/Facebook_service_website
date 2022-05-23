<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'login') {
        $user_username            = htmlspecialchars(addslashes($_POST['user_username']));
        $user_password            = md5(htmlspecialchars(addslashes($_POST['user_password'])));
        $check_username_available = mysqli_num_rows(mysqli_query($conn, "SELECT user_id FROM table_user WHERE user_username = '$user_username'"));
        $check_user               = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_user WHERE user_username = '$user_username'"));
        $user_ip                  = $_SERVER['REMOTE_ADDR'];
        $user_time                = time();
        if ($check_username_available == 0) {
            $return['error'] = 1;
            $return['msg']   = 'The account field is not in the system.';
            die(json_encode($return));
        } else if ($check_user['user_password'] != $user_password) {
            $return['error'] = 1;
            $return['msg']   = 'The password field is incorrect.';
            die(json_encode($return));
        } else if ($check_user['user_blocked'] == 1) {
            $return['error'] = 1;
            $return['msg']   = 'The account field has been locked.';
            die(json_encode($return));
        } else {
            $_SESSION['login']         = 'ok';
            $_SESSION['user_username'] = $user_username;
            if (mysqli_query($conn, "INSERT INTO table_history_user(history_user_username, history_user_content, history_user_ip, history_user_time) 
            VALUES ('$user_username', 'Login Account.', '$user_ip', '$user_time')")) {
                $return['msg'] = 'Login Successfully.';
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