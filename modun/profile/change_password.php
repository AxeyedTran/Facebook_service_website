<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'change_password') {
        $user_password         = md5(htmlspecialchars(addslashes($_POST['user_password'])));
        $user_new_password     = md5(htmlspecialchars(addslashes($_POST['user_new_password'])));
        $user_confirm_password = md5(htmlspecialchars(addslashes($_POST['user_confirm_password'])));
        $history_account_ip    = $_SERVER['REMOTE_ADDR'];
        $history_user_time     = time();
        $check_user            = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_user WHERE user_username = '$user_username'"));
        if (strlen($user_new_password) > 32 || strlen($user_new_password) < 5) {
            $return['error'] = 1;
            $return['msg']   = 'Trường mật khẩu phải có tối thiểu 6 kí tự.';
            die(json_encode($return));
        } else if ($user_new_password != $user_confirm_password) {
            $return['error'] = 1;
            $return['msg']   = 'Trường nhập lại mật khẩu không đúng.';
            die(json_encode($return));
        } else if ($check_user['user_password'] != $user_password) {
            $return['error'] = 1;
            $return['msg']   = 'Trường mật khẩu cũ không đúng.';
            die(json_encode($return));
        } else {
            mysqli_query($conn, "INSERT INTO table_history_user(history_user_username, history_user_content, history_user_ip, history_user_time) 
            VALUES ('$user_username', 'Thay đổi mật khẩu tài khoản.', '$history_account_ip', '$history_user_time')");
            if (mysqli_query($conn, "UPDATE table_user SET user_password = '$user_new_password', user_time_last = '$history_user_time' WHERE user_username = '$user_username'")) {
                $return['msg'] = 'Thay đổi mật khẩu tài khoản thành công.';
                die(json_encode($return));
            } else {
                $return['error'] = 1;
                $return['msg']   = 'Có gì đó không ổn.';
                die(json_encode($return));
            }
        }
        
    }
}
?>