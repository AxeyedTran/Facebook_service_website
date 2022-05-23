<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array('error' => 0);
    $type   = $_REQUEST['type'];
    if ($type === 'update_info') {
        $user_fullname      = htmlspecialchars(addslashes($_POST['user_fullname']));
        $user_phone         = htmlspecialchars(addslashes($_POST['user_phone']));
        $user_email         = htmlspecialchars(addslashes($_POST['user_email']));
        $user_ip            = $_SERVER['REMOTE_ADDR'];
        $history_account_ip = $_SERVER['REMOTE_ADDR'];
        $user_time_last     = time();
        $check_fb_available = mysqli_num_rows(mysqli_query($conn, "SELECT user_fb FROM table_user WHERE user_fb = '$user_fb'"));
        if (strlen($user_phone) > 11 || strlen($user_phone) < 10) {
            $return['error'] = 1;
            $return['msg']   = 'The phone number field must be at least 10 to 11 characters long.';
            die(json_encode($return));
        } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $return['error'] = 1;
            $return['msg']   = 'The Email field is not in the correct format.';
            die(json_encode($return));
        } else {
            mysqli_query($conn, "INSERT INTO table_history_user(history_user_username, history_user_content, history_user_ip, history_user_time) +
            VALUES ('$user_username', 'Update account information', '$history_account_ip', '$user_time_last')");
            if (mysqli_query($conn, "UPDATE table_user SET user_fullname = '$user_fullname', user_phone = '$user_phone', user_email = '$user_email', user_level = 1, user_time_last = '$user_time' WHERE user_username = '$user_username'")) {
                $return['msg'] = 'Successfully updated account information.';
                die(json_encode($return));
            } else {
                $return['error'] = 1;
                $return['msg']   = 'Something went wrong.';
                die(json_encode($return));
            }
        }
        
    }
}
?>