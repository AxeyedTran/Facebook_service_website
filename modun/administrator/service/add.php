<?php
require_once '../../../_config.php';
if ($_REQUEST) {
    $return = array('error' => 0);
    $type   = $_REQUEST['type'];
    if ($type === 'service_add') {
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
        $service_status         = true;
        $service_time           = time();
        $check_slug_available   = mysqli_num_rows(mysqli_query($conn, "SELECT service_id FROM table_service WHERE service_slug = '$service_slug'"));
        if ($check_slug_available > 0) {
            $return['error'] = 1;
            $return['msg']   = 'Trường slug này đã tồn tại trên hệ thống.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "INSERT INTO table_service(service_title, service_slug, service_category, service_price, service_price_server_1, service_price_server_2, service_price_server_3, service_price_server_4, service_min_amount, service_max_amount, service_info, service_noted, service_status, service_time) 
            VALUES ('$service_title', '$service_slug', '$service_category', '$service_price', '$service_price_server_1', '$service_price_server_2', '$service_price_server_3', '$service_price_server_4', '$service_min_amount', '$service_max_amount', '$service_info', '$service_noted', '$service_status', '$service_time')")) {
                $return['msg'] = 'Thêm dịch vụ mới thành công.';
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