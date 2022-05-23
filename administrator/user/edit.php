<?php
require_once '../../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level != 4){
    header('location: /home');
    die();
}
$user_id = $_GET['user_id'];
$result = mysqli_query($conn, "SELECT * FROM table_user WHERE user_id = '$user_id'");
$row = mysqli_fetch_array($result);
$title = 'Edit User | KDH Team';
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
                        Chỉnh sửa người dùng</li>
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
                        <h5 class="mb-0">Chỉnh sửa người dùng #<?=$row['user_username'];?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <input type="hidden" name="t" value="info">
                    <div class="mb-3">
                        <label>Họ Tên:</label>
                        <input type="text" class="form-control" id="user_fullname" value="<?=$row['user_fullname'];?>"
                            required="">
                    </div>
                    <div class="mb-3">
                        <label>Tài khoản :</label>
                        <input type="text" class="form-control" id="user_username" value="<?=$row['user_username'];?>"
                            required="">
                    </div>
                    <div class="mb-3">
                        <label>Cấp độ :</label>
                        <select id="user_level" class="form-control">
                            <option value="1"
                                <?php if (preg_match("/(1)/", "".$row['user_level']."")) {echo "selected";}?>>
                                Thành viên</option>
                            <option value="2"
                                <?php if (preg_match("/(2)/", "".$row['user_level']."")) {echo "selected";}?>>
                                Cộng Tác Viên</option>
                            <option value="3"
                                <?php if (preg_match("/(3)/", "".$row['user_level']."")) {echo "selected";}?>>
                                Đại lý</option>
                            <option value="4"
                                <?php if (preg_match("/(4)/", "".$row['user_level']."")) {echo "selected";}?>>
                                Quản trị viên</option>
                        </select>
                    </div>
                    <center>
                        <button type="button" class="btn btn-info btn-rounded btn-block" id="userEdit"
                            onclick="user_edit();"><i class="fa fa-info"></i> Lưu thông tin</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function user_edit() {
    var user_fullname = $('#user_fullname').val();
    var user_username = $('#user_username').val();
    var user_level = $('#user_level').val();
    if (!user_fullname) {
        swal('Trường họ và tên không được bỏ trống.', 'error');
        return;
    }
    if (!user_username) {
        swal('Trường tài khoản không được bỏ trống.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'administrator/user/edit',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'user_edit',
            user_id: <?=$row['user_id'];?>,
            user_fullname: user_fullname,
            user_username: user_username,
            user_level: user_level
        },
        beforeSend: function() {
            wait('#editUser', false);
        },
        complete: function() {
            wait('#editUser', true, '<i class="fa fa-info"></i> Lưu thông tin');
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