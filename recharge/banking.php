<?php
require_once '../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$title = 'Top Up Banking | KDH Team';
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
                        Top Up Banking</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header bg-light">
        <div class="row justify-content-between">
            <div class="col-md-auto">
                <h5 class="mb-3 mb-md-0">Top Up Banking</h5>
            </div>
            <div class="col-md-auto"><a class="btn btn-falcon-primary btn-sm" href="/recharge/card"><i
                        class="fa fa-credit-card"></i> Top Up Scratch Card</a>
            </div>
        </div>
    </div>
    <div class="card-body bg-light overflow-hidden">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-12">
                <h5 class="text-primary"></h5>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading font-weight-semi-bold text-center">
                        <a href="#"><b>20.000 vnd = 14.000 Coin</b></a>
                    </br>
                        <a href="#"><b>1$ = 17.000 Coin</b></a>
                    </h4>
                </div>
            </div>
            </div>
            <div class="mb-3 col-sm-6">
                <div class="alert alert-success" role="alert">MB BANK: <b><a href="javascript:;"
                            onclick="copystk();"><b>5555555550511 </b><i class="far fa-copy"></i>
                        </a>
                    </b>
                    <br>Account Holder: <b>NGO MINH HOANG</b>
                    <br>Minimum Amount: <b>20,000 vnd</b>
                </div>
            </div>
            <div class="mb-3 col-sm-6">
                <div class="alert alert-success" role="alert">PayPal: <b><a href="javascript:;"
                            onclick="copy('axeyedkha191@gmail.com');"><b>axeyedkha191@gmail.com </b><i class="far fa-copy"></i>
                        </a>
                    </b>
                    <br>Account Holder: <b>Axeyed Tran Kha</b>
                    <br>Minimum Amount: <b>1$</b>
                </div>
            </div>
            <div class="col-md-12">
                <h5 class="text-primary">Content Banking</h5>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading font-weight-semi-bold text-center">
                        <a href="javascript:;" onclick="copyContent();"><b><?php echo $site_name; ?> <?=$user_username;?></b>&nbsp;<i
                                class="far fa-copy"></i></a>
                    </h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <h5 class="alert-heading font-weight-semi-bold">Warning</h5>
                    <p>Depositing with incorrect syntax will be deducted 20% transaction fee.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copy(text) {
    var input = document.createElement('input');
    input.setAttribute('value', text);
    document.body.appendChild(input);
    input.select();
    var result = document.execCommand('copy');
    document.body.removeChild(input);
    swal('Copied !', 'success');
}

function copystk() {
    var text = "5555555550511";
    copy(text);
    swal('Copied !', 'success');
}

function copyContent() {
    var text = "<?php echo $site_name; ?> <?=$user_username;?>";
    copy(text);
    swal('Copied !', 'success');
}
</script>
<?php require_once '../includes/footer.php'; ?>