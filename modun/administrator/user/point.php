<?php
require_once '../../../_config.php';
if ($_REQUEST) {
    $return = array('error' => 0);
    $type   = $_REQUEST['type'];
    if ($type === 'add_point') {
        $user_id    = htmlspecialchars(addslashes($_POST['user_id']));
        $user_point    = htmlspecialchars(addslashes($_POST['user_point']));
        $user_type    = htmlspecialchars(addslashes($_POST['user_type']));
        $check_id_available = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_user WHERE user_id = '$user_id'"));
        if ($check_id_available == 0) {
            $return['error'] = 1;
            $return['msg']   = 'Trường id này không tồn tại trong hệ thống.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "UPDATE table_user SET user_point = user_point $user_type '$user_point' WHERE user_id = '$user_id'")) {
                $return['msg'] = '' . $user_type . '' . $user_point . ' cho tài khoản có id ' . $user_id . ' thành công.';
                die(json_encode($return));
            } else {
                $return['error'] = 1;
                $return['msg']   = 'Bạn không có quyền truy cập bản quyền';
                die(json_encode($return));
            }
        }
        
    }
}
?>