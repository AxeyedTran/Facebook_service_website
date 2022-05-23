<?php
require_once '../../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'service_edit') {
        $service_id             = htmlspecialchars(addslashes($_POST['service_id']));
        $service_title          = htmlspecialchars(addslashes($_POST['service_title']));
        $service_slug           = htmlspecialchars(addslashes($_POST['service_slug']));
        $service_category       = htmlspecialchars(addslashes($_POST['service_category']));
        $service_price          = htmlspecialchars(addslashes($_POST['service_price']));
        $service_price_server_1 = htmlspecialchars(addslashes($_POST['service_price_server_1']));
        $service_price_server_2 = htmlspecialchars(addslashes($_POST['service_price_server_2']));
        $service_price_server_3 = htmlspecialchars(addslashes($_POST['service_price_server_3']));
        $service_price_server_4 = htmlspecialchars(addslashes($_POST['service_price_server_4']));
        $service_min_amount     = htmlspecialchars(addslashes($_POST['service_min_amount']));
        $service_max_amount     = htmlspecialchars(addslashes($_POST['service_max_amount']));
        $service_info           = $_POST['service_info'];
        $service_noted          = $_POST['service_noted'];
        $check_user_available   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_service WHERE service_id = '$service_id'"));
        if ($check_user_available == 0) {
            $return['error'] = 1;
            $return['msg']   = 'Trường id không tồn tại trong hệ thống.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "UPDATE table_service SET service_title = '$service_title', service_slug = '$service_slug', service_category = '$service_category', service_price = '$service_price', service_price_server_1 = '$service_price_server_1', service_price_server_2 = '$service_price_server_2', service_price_server_3 = '$service_price_server_3', service_price_server_4 = '$service_price_server_4', service_min_amount = '$service_min_amount', service_max_amount = '$service_max_amount', service_info = '$service_info', service_noted = '$service_noted' WHERE service_id = '$service_id'")) {
                $return['msg'] = 'Chỉnh sửa dịch vụ ' . $service_title . ' thành công.';
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