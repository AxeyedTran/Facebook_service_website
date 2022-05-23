<?php
require_once '../../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'buff-follow-facebook') {
        $buff_fb_id              = htmlspecialchars(addslashes($_POST['buff_fb_id']));
        $buff_server             = htmlspecialchars(addslashes($_POST['buff_server']));
        $buff_amount             = htmlspecialchars(addslashes($_POST['buff_amount']));
        $buff_note               = htmlspecialchars(addslashes($_POST['buff_note']));
        $buff_present            = 0;
        $buff_status             = 'progress';
        $buff_time               = time();
        $check_service           = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM table_service WHERE service_slug = '$type'"));
        if ($buff_server == 1) {
            $check_service['service_price'] = $check_service['service_price'];
        } else if ($buff_server == 2) {
            $check_service['service_price'] = $check_service['service_price_server_1'];
        } else if ($buff_server == 3) {
            $check_service['service_price'] = $check_service['service_price_server_2'];
        } else if ($buff_server == 4) {
            $check_service['service_price'] = $check_service['service_price_server_3'];
        } else if ($buff_server == 5) {
            $check_service['service_price'] = $check_service['service_price_server_4'];
        }
        $buff_payment      = $check_service['service_price'] * $buff_amount;
        $history_buy_point_final = $user_point - $buff_payment;
        $service_title           = $check_service['service_title'];
        if ($user_point < $buff_payment) {
            $return['error'] = 1;
            $return['msg']   = 'Your balance is not enough to pay, please top up.';
            die(json_encode($return));
        } else if ($buff_amount < $check_service['service_min_amount']) {
            $return['error'] = 1;
            $return['msg']   = 'The quantity field must be at least ' . $check_service['service_min_amount'] . 'Followers.';
            die(json_encode($return));
        } else if ($buff_amount > $check_service['service_max_amount']) {
            $return['error'] = 1;
            $return['msg']   = 'The maximum number field is ' . $check_service['service_max_amount'] . 'Followers.';
            die(json_encode($return));
        }else {
            mysqli_query($conn, "UPDATE table_user SET user_point = user_point - '$buff_payment' WHERE user_username = '$user_username'");
            mysqli_query($conn, "INSERT INTO table_history_buy(history_buy_username, history_buy_type, history_buy_point_original, history_buy_point_final, history_buy_content, history_buy_time) 
            VALUES ('$user_username', '$service_title', '$user_point', '$history_buy_point_final', '$buff_note', '$buff_time')");
            if (mysqli_query($conn, "INSERT INTO table_buff(buff_username, buff_slug, buff_fb_id, buff_server, buff_amount, buff_note, buff_present, buff_payment, buff_status, buff_time) 
            VALUES ('$user_username','$type', '$buff_fb_id', '$buff_server', '$buff_amount', '$buff_note', '$buff_present', '$buff_payment', '$buff_status', '$buff_time')")) {
                $return['msg'] = 'Buy '.$service_title.' Successfully.';
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