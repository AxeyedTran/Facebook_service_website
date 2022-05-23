<?php
require_once '../../_config.php';
if ($_REQUEST) {
    $return = array(
        'error' => 0
    );
    $type   = $_REQUEST['type'];
    if ($type === 'edit-site') {
        $site_title            = htmlspecialchars(addslashes($_POST['site_title']));
        $site_logo             = htmlspecialchars(addslashes($_POST['site_logo']));
        $site_name             = htmlspecialchars(addslashes($_POST['site_name']));
        $site_keyword          = htmlspecialchars(addslashes($_POST['site_keyword']));
        $site_domain           = htmlspecialchars(addslashes($_POST['site_domain']));
        $site_fb_token         = htmlspecialchars(addslashes($_POST['site_fb_token']));
        $site_facebook         = htmlspecialchars(addslashes($_POST['site_facebook']));
        $site_zalo             = htmlspecialchars(addslashes($_POST['site_zalo']));
        $site_fanpage          = htmlspecialchars(addslashes($_POST['site_fanpage']));
        $site_mail_username    = htmlspecialchars(addslashes($_POST['site_mail_username']));
        $site_mail_password    = htmlspecialchars(addslashes($_POST['site_mail_password']));
        $site_mmo_partner_id   = htmlspecialchars(addslashes($_POST['site_mmo_partner_id']));
        $site_mmo_partner_key  = htmlspecialchars(addslashes($_POST['site_mmo_partner_key']));
        $site_card_partner_id  = htmlspecialchars(addslashes($_POST['site_card_partner_id']));
        $site_card_partner_key = htmlspecialchars(addslashes($_POST['site_card_partner_key']));
        $site_status           = htmlspecialchars(addslashes($_POST['site_status']));
        if ($user_level != 4) {
            $return['error'] = 1;
            $return['msg']   = 'Bạn không phải là quản trị viên.';
            die(json_encode($return));
        } else {
            if (mysqli_query($conn, "UPDATE table_site SET site_title = '$site_title', site_logo = '$site_logo', site_name = '$site_name', site_keyword = '$site_keyword', site_domain = '$site_domain', site_fb_token = '$site_fb_token', site_facebook = '$site_facebook', site_zalo = '$site_zalo', site_fanpage = '$site_fanpage', site_mail_username = '$site_mail_username', site_mail_password = '$site_mail_password', site_mmo_partner_id = '$site_mmo_partner_id', site_mmo_partner_key = '$site_mmo_partner_key', site_card_partner_id = '$site_card_partner_id', site_card_partner_key = '$site_card_partner_key', site_status = '$site_status' WHERE site_id = '1'")) {
                $return['msg'] = 'Chỉnh sửa cài đặt trang thành công';
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