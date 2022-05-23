<?php
require_once '../_config.php';

$title = 'Login | KDH Team';
require_once '../includes/header.php';
if ($kdh == true) {
    header('location: /home');
    die();
}
?>
<div class="row flex-center min-vh-100 py-6">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <a class="d-flex flex-center mb-4" href="/">
        <span class="font-sans-serif fw-bolder fs-5 d-inline-block"><?=$site_name;?></span>
        </a>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <div class="row flex-between-center mb-2">
                    <div class="col-auto">
                        <h5>Login</h5>
                    </div>
                    <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">Or</span> <span><a
                                href="/auth/register">Register</a></span>
                    </div>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="user_username" placeholder="Account Name" />
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" id="user_password" placeholder="Password" />
                    </div>
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" />
                                <label class="form-check-label" for="basic-checkbox">Remember Me?</label>
                            </div>
                        </div><div class="col-auto"><a class="fs--1" onclick="fpwd()">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="button" id="loGin"
                            onclick="login();">Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function fpwd(){
    Swal.fire('Contact Us','facebook.com/KDH.IT','success')
}
</script>
<script>
function login() {
    var user_username = $('#user_username').val();
    var user_password = $('#user_password').val();
    if (!user_username) {
        swal('The account field cannot be left blank.', 'error');
        return;
    }
    if (!user_password) {
        swal('The password field cannot be left blank.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'auth/login',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'login',
            user_username: user_username,
            user_password: user_password
        },
        beforeSend: function() {
            wait('#loGin', false);
        },
        complete: function() {
            wait('#loGin', true, 'Login');
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