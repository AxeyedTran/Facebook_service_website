<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array('error' => 0);
    $type   = $_REQUEST['type'];
    if ($type === 'change_info') {
        $user_fb            = htmlspecialchars(addslashes($_POST['user_fb']));
        $user_ip            = $_SERVER['REMOTE_ADDR'];
        $user_time          = time();
        $history_account_ip    = $_SERVER['REMOTE_ADDR'];
        $history_user_time     = time();
        $check_fb_available = mysqli_num_rows(mysqli_query($conn, "SELECT user_fb FROM table_user WHERE user_fb = '$user_fb'"));
        if (strlen($user_fb) > 32 || strlen($user_fb) < 5) {
            $return['error'] = 1;
            $return['msg']   = 'Trường ID facebook phải có tối thiểu 6 kí tự.';
            die(json_encode($return));
        } else if ($check_fb_available > 0) {
            $return['error'] = 1;
            $return['msg']   = 'Trường ID facebook đã có trong hệ thống.';
            die(json_encode($return));
        } else {
            mysqli_query($conn, "INSERT INTO table_history_user(history_user_username, history_user_content, history_user_ip, history_user_time) 
            VALUES ('$user_username', 'Thay đổi thông tin tài khoản', '$history_account_ip', '$history_user_time')");
            if (mysqli_query($conn, "UPDATE table_user SET user_fb = '$user_fb' WHERE user_username = '" . $_SESSION['user_username'] . "'")) {
                $return['msg']   = 'Thay đổi thông tin thành công.';
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