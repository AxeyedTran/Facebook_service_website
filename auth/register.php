<?php
require_once '../_config.php';

$title = 'Register | KDH Team';
require_once '../includes/header.php';

if ($kdh == true) {
    header('location: /home');
    die();
}
?>
<div class="row flex-center min-vh-100 py-6">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <a class="d-flex flex-center mb-4" href="../../index.html"><span
                class="font-sans-serif fw-bolder fs-5 d-inline-block"><?=$site_name;?></span>
        </a>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <div class="row flex-between-center mb-2">
                    <div class="col-auto">
                        <h5>Register</h5>
                    </div>
                    <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">You Have An Account?</span> <span><a href="/auth/login">Login</a></span>
                    </div>
                </div>
                <form>
                    <input type="hidden" id="user_token" value="<?php echo random_code(30);?>">
                    <div class="mb-3">
                        <input class="form-control" id="user_username" type="text" placeholder="Acount Name" />
                    </div>
                    <div class="row gx-3">
                        <div class="mb-3 col-sm-6">
                            <input class="form-control" type="password" id="user_password"
                                placeholder="Password" />
                        </div>
                        <div class="mb-3 col-sm-6">
                            <input class="form-control" type="password" id="user_confirm_password"
                                placeholder="Repeat Password" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="button" id="regIster"
                            onclick="register();">Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function register() {
    var user_token = $('#user_token').val();
    var user_username = $('#user_username').val();
    var user_password = $('#user_password').val();
    var user_confirm_password = $('#user_confirm_password').val();
    if (!user_username) {
        swal('The account field cannot be left blank.', 'error');
        return;
    }
    if (!user_password) {
        swal('The password field cannot be left blank.', 'error');
        return;
    }
    if (!user_confirm_password) {
        swal('The repeat password field cannot be left blank.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'auth/register',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'register',
            user_token: user_token,
            user_username: user_username,
            user_password: user_password,
            user_confirm_password: user_confirm_password
        },
        beforeSend: function() {
            wait('#regIster', false);
        },
        complete: function() {
            wait('#regIster', true, 'Đăng ký');
        },
        success: (data) => {
            if (data.error) {
                swal(data.msg, "error");
            } else {
                swal(data.msg, "success");
                setTimeout(function() {
                    window.location.href = '/auth/login';
                }, 1000);
            }
        }
    })
}
</script>
<?php require_once '../includes/footer.php'; ?>