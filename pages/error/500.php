<?php 
require_once '../../_config.php'; 
require_once '../../includes/header.php'; 
?>
<div class="row flex-center min-vh-100 py-6 text-center">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
        <a class="d-flex flex-center mb-4" href="/home"><span
                class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">falcon</span>
        </a>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <div class="display-1 text-300 fs-error">500</div>
                <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">The page you're looking for is not
                    found.
                </p>
                <hr />
                <p>Make sure the address is correct and that the page hasn't moved. If you think this is a mistake, <a
                        href="mailto:info@exmaple.com">contact us</a>.</p><a class="btn btn-primary btn-sm mt-3"
                    href="/home"><span class="fas fa-home mr-2"></span>Take me home</a>
            </div>
        </div>
    </div>
</div>
<?php require_once '../../includes/footer.php'; ?>