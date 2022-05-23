<?php
require_once '../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level != 4){
    header('location: /home');
    die();
}
$service_id = $_GET['service_id'];
$result = mysqli_query($conn, "SELECT * FROM table_service WHERE service_id = '$service_id'");
$row = mysqli_fetch_array($result);
$title = 'Edit Site | KDH Team';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"></div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-sans-serif"><a href="/"><strong><i class="fas fa-globe"></i>
                                <?=$site_name;?></strong></a></li>
                    <li class="breadcrumb-item font-sans-serif active" aria-current="page"><i class="fas fa-link"></i>
                        Chỉnh sửa cài đặt trang</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row g-0">
    <div class="col-lg-12">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-header bg-light">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Chỉnh sửa cài đặt trang</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Tiêu đề:</label>
                            <input id="site_title" type="text" class="form-control" value="<?=$site_title;?>"
                                placeholder="Nhập tiêu đề của trang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Logo:</label>
                            <input id="site_logo" type="text" class="form-control" value="<?=$site_logo;?>"
                                placeholder="Nhập logo của trang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tên trang:</label>
                            <input id="site_name" type="text" class="form-control" value="<?=$site_name;?>"
                                placeholder="Nhập tên trang của trang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Keyword:</label>
                            <input id="site_keyword" type="text" class="form-control" value="<?=$site_keyword;?>"
                                placeholder="Nhập keyword của trang">
                        </div>
                        <div class="form-group md-3">
                            <label>Tên miền:</label>
                            <input id="site_domain" type="text" class="form-control" value="<?=$site_domain;?>"
                                placeholder="Nhập tên miền của trang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Token Facebook:</label>
                            <input id="site_fb_token" type="text" class="form-control" value="<?=$site_fb_token;?>"
                                placeholder="Nhập token facebook của trang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Facebook:</label>
                            <input id="site_facebook" type="text" class="form-control" value="<?=$site_facebook;?>"
                                placeholder="Nhập facebook của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Zalo:</label>
                            <input id="site_zalo" type="text" class="form-control" value="<?=$site_zalo;?>"
                                placeholder="Nhập zalo của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Fanpage:</label>
                            <input id="site_fanpage" type="text" class="form-control" value="<?=$site_fanpage;?>"
                                placeholder="Nhập fanpage của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tài khoản mail:</label>
                            <input id="site_mail_username" type="text" class="form-control"
                                value="<?=$site_mail_username;?>" placeholder="Nhập tài khoản mail của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Mật khẩu mail:</label>
                            <input id="site_mail_password" type="text" class="form-control"
                                value="<?=$site_mail_password;?>" placeholder="Nhập mật khẩu mail của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Id Momo:</label>
                            <input id="site_mmo_partner_id" type="text" class="form-control"
                                value="<?=$site_mmo_partner_id;?>" placeholder="Nhập facebook của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Key Momo:</label>
                            <input id="site_mmo_partner_key" type="text" class="form-control"
                                value="<?=$site_mmo_partner_key;?>" placeholder="Nhập facebook của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Id Thẻ:</label>
                            <input id="site_card_partner_id" type="text" class="form-control"
                                value="<?=$site_card_partner_id;?>" placeholder="Nhập facebook của trang">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Key thẻ:</label>
                            <input id="site_card_partner_key" type="text" class="form-control"
                                value="<?=$site_card_partner_key;?>" placeholder="Nhập facebook của trang">
                        </div>
                        <div class="form-group md-3">
                            <label>Trạng thái:</label>
                            <input id="site_status" type="text" class="form-control" value="<?=$site_status;?>"
                                placeholder="Nhập facebook của trang">
                        </div>
                    </div>
                    <br />
                    <center>
                        <button type="button" class="btn btn-info btn-rounded btn-block" id="editSite"
                            onclick="edit_site();"><i class="fa fa-info"></i> Lưu thông tin</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function edit_site() {
    var site_title = $('#site_title').val();
    var site_logo = $('#site_logo').val();
    var site_name = $('#site_name').val();
    var site_keyword = $('#site_keyword').val();
    var site_domain = $('#site_domain').val();
    var site_fb_token = $('#site_fb_token').val();
    var site_facebook = $('#site_facebook').val();
    var site_zalo = $('#site_zalo').val();
    var site_fanpage = $('#site_fanpage').val();
    var site_mail_username = $('#site_mail_username').val();
    var site_mail_password = $('#site_mail_password').val();
    var site_mmo_partner_id = $('#site_mmo_partner_id').val();
    var site_mmo_partner_key = $('#site_mmo_partner_key').val();
    var site_card_partner_id = $('#site_card_partner_id').val();
    var site_card_partner_key = $('#site_card_partner_key').val();
    var site_status = $('#site_status').val();
    if (!site_title) {
        swal('Trường tiêu đề không được bỏ trống.', 'error');
        return;
    }
    if (!site_name) {
        swal('Trường tên trang không được bỏ trống.', 'error');
        return;
    }
    if (!site_domain) {
        swal('Trường tên miền không được bỏ trống.', 'error');
        return;
    }
    if (!site_fb_token) {
        swal('Trường token facebook không được bỏ trống.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'administrator/edit-site',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'edit-site',
            site_title: site_title,
            site_logo: site_logo,
            site_name: site_name,
            site_keyword: site_keyword,
            site_domain: site_domain,
            site_fb_token: site_fb_token,
            site_facebook: site_facebook,
            site_zalo: site_zalo,
            site_fanpage: site_fanpage,
            site_mail_username: site_mail_username,
            site_mail_password: site_mail_password,
            site_mmo_partner_id: site_mmo_partner_id,
            site_mmo_partner_key: site_mmo_partner_key,
            site_card_partner_id: site_card_partner_id,
            site_card_partner_key: site_card_partner_key,
            site_status: site_status
        },
        beforeSend: function() {
            wait('#editSite', false);
        },
        complete: function() {
            wait('#editSite', true, '<i class="fa fa-info"></i> Lưu thông tin');
        },
        success: (data) => {
            if (data.error) {
                swal(data.msg, "error");
            } else {
                swal(data.msg, "success");
                setTimeout(function() {
                    location.reload();
                }, 200);
            }
        }
    })
}
</script>

<?php require_once '../includes/footer.php'; ?>