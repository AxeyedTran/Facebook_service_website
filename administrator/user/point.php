<?php
require_once '../../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level != 4){
    header('location: /home');
    die();
}
$title = 'Add Coin | KDH Team';
require_once '../../includes/header.php';
require_once '../../includes/navbar.php';
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
                        Cộng, trừ tiền người dùng</li>
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
                        <h5 class="mb-0">Cộng, trừ tiền người dùng</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <input type="hidden" name="t" value="info">
                    <div class="mb-3">
                        <label>ID Tài khoản:</label>
                        <input type="text" class="form-control" id="user_id" placeholder="Nhập id của người dùng" required="">
                    </div>
                    <div class="mb-3">
                        <label>Số tiền:</label>
                        <input type="number" class="form-control" id="user_point" placeholder="Nhập số tiền cần cộng, trừ" required="">
                    </div>
                    <div class="mb-3">
                        <label>Chọn chức năng:</label>
                        <select id="user_type" class="form-control">
                            <option value="-">Trừ</option>
                            <option value="+" selected>Cộng</option>
                        </select>
                    </div>
                    <center>
                        <button type="button" class="btn btn-success btn-rounded btn-block" id="userMoney"
                            onclick="add_point();"><i class="fa fa-info"></i> Thực hiện</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function add_point() {
    var user_id = $('#user_id').val();
    var user_point = $('#user_point').val();
    var user_type = $('#user_type').val();
    if (!user_id) {
        swal('Trường ID tài khoản không được bỏ trống.', 'error');
        return;
    }
    if (!user_point) {
        swal('Trường số tiền không được bỏ trống.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'administrator/user/point',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'add_point',
            user_id: user_id,
            user_point: user_point,
            user_type: user_type
        },
        beforeSend: function() {
            wait('#userMoney', false);
        },
        complete: function() {
            wait('#userMoney', true, '<i class="fa fa-info"></i> Thực hiện');
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

<?php require_once '../../includes/footer.php'; ?>