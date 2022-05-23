<?php 
require_once '../_config.php'; 
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 1){
    header('location: /home');
    die();
}
$title = 'Cập nhật thông tin tài khoản';
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
                                <?=$site_name;?></strong></a>
                    </li>
                    <li class="breadcrumb-item font-sans-serif active" aria-current="page"><i class="fas fa-link"></i>Update Info</li>
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
                        <h5 class="mb-0">Update Info</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <div class="alert alert-info" role="alert"><i class="fa fa-bell"></i> To ensure the safety of your account, please update your personal information here, personal information must be accurate for us
we can best help you with problems that arise later!
                </div>
                <br>
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <input type="hidden" name="t" value="info">
                    <div class="mb-3">
                        <label>Username:</label>
                        <input type="text" class="form-control" id="user_fullname" placeholder="Enter Your Name"
                            required="">
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" id="user_phone" placeholder="Enter The Phone Number"
                            required="">
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="text" class="form-control" id="user_email" placeholder="Email" required="">
                    </div>
                    <div class="alert alert-warning" role="alert"><strong>[*]</strong> Please make sure the information you have entered is <code>correct</code>, if we detect the
                        <code>the above information is wrong</code> we can
                        <code>Delete your account</code> without warning. Thank you for using <?php echo $site_name; ?>
                    </div>
                    <center>
                        <button type="button" class="btn btn-success btn-rounded btn-block" id="updateInfo"
                            onclick="update_info();"><i class="fa fa-info"></i> Update</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>

</div>

<script>
function update_info() {
    var user_fullname = $('#user_fullname').val();
    var user_phone = $('#user_phone').val();
    var user_email = $('#user_email').val();
    if (!user_fullname) {
        swal('The first and last name fields cannot be left blank.', 'error');
        return;
    }
    if (!user_phone) {
        swal('The phone number field cannot be left blank.', 'error');
        return;
    }
    if (!user_email) {
        swal('The email field cannot be left blank.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'profile/update-info',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'update_info',
            user_fullname: user_fullname,
            user_phone: user_phone,
            user_email: user_email
        },
        beforeSend: function() {
            wait('#updateInfo', false);
        },
        complete: function() {
            wait('#updateInfo', true, '<i class="fa fa-info"></i> Save');
        },
        success: (data) => {
            if (data.error) {
                swal(data.msg, "error");
            } else {
                swal(data.msg, "success");
                setTimeout(function() {
                    window.location.href = '/home';
                }, 1000);
            }
        }
    })
}
</script>

<?php require_once '../includes/footer.php'; ?>