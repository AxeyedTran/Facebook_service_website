<?php
require_once '../../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'user_edit') {
        $user_id              = htmlspecialchars(addslashes($_POST['user_id']));
        $user_fullname        = htmlspecialchars(addslashes($_POST['user_fullname']));
        $user_username        = htmlspecialchars(addslashes($_POST['user_username']));
        $user_level           = htmlspecialchars(addslashes($_POST['user_level']));
        $check_user_available = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_user WHERE user_id = '$user_id'"));
        if ($check_user_available == 0) {
            $return['error'] = 1;
            $return['msg']   = 'Trường tài khoản không tồn tại trong hệ thống.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "UPDATE table_user SET user_fullname = '$user_fullname', user_username = '$user_username', user_level = '$user_level' WHERE user_id = '$user_id'")) {
                $return['msg'] = 'Chỉnh sửa người dùng ' . $user_username . ' thành công.';
                die(json_encode($return));
            } else {
                $return['error'] = 1;
                $return['msg']   = 'Có gì đó không ổn';
                die(json_encode($return));
            }
        }
    }
}
?>