<?php
require_once '../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$title = 'Top Up | KDH Team';
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
                    Top up by scratch card</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header bg-light">
        <div class="row justify-content-between">
            <div class="col-md-auto">
                <h5 class="mb-3 mb-md-0">Top up scratch card</h5>
            </div>
            <div class="col-md-auto"><a class="btn btn-falcon-primary btn-sm" href="/recharge/banking"><i
                        class="fa fa-credit-card"></i> Top up banking</a>
            </div>
        </div>
    </div>
    <div class="card-body bg-light overflow-hidden">
        <form>
           <a href="https://facebook.com/KDH.IT" target="_blank" class="btn btn-falcon-primary btn-sm">
                <i class="fab fa-facebook-f"></i> Please Top Up Card via Facebook. Because we are fixing this page </a>
                <div>
                    </br>
                <h5>All cards have 30% discount</h5>
                </br>
                <h5>20.000 vnd = 14.000 Coin</h5>
                </br>
                <h5>1$ = 17.000 Coin</h5>
                </div>
        </form>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>