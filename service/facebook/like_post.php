<?php
include_once "../../_config.php";
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level == 0){
    header('location: /profile/update-info');
    die();
}
$result = mysqli_query($conn,"SELECT * FROM table_service WHERE service_slug = 'buff-like-post-facebook'");
$row = mysqli_fetch_assoc($result);
$title = $row['service_title'];
include_once "../../includes/header.php";
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
                                <?=$site_name;?></strong></a>
                    </li>
                    <li class="breadcrumb-item font-sans-serif active" aria-current="page"><i class="fas fa-link"></i>
                        <?=$row['service_title'];?></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row g-0">
    <div class="col-lg-8 pe-lg-2 mb-3">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-header bg-light">
                <div class="row justify-content-between">
                    <div class="col-md-auto">
                        <h5 class="mb-3 mb-md-0"><?=$row['service_title'];?></h5>
                    </div>
                    <div class="col-md-auto"><a class="btn btn-falcon-default btn-sm"
                            href="/service/facebook/like-post/list"><span class="fas fa-list fs--2 mr-1"></span> Order List</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" id="form_id" class="user" method="POST" accept-charset="utf-8">
                    <label>Server:</label>
                    <div class="form-check">
                        <input class="form-check-input" checked="checked" id="buff_server" type="radio"
                            onchange="bill();" name="server" value="1" data-bs-toggle="collapse" />
                        <label class="form-check-label" for="buff_server">Server 1 (<b><?=$row['service_price'];?> Coin</b>)<b class="text-warning"> (Active)</b></label>

                    </div>

                    <?php if ($row['service_price_server_1'] != 0) { ?>
                    <div class="form-check">
                        <input class="form-check-input" id="buff_server" type="radio" onchange="bill();" name="server"
                            value="2" data-bs-toggle="collapse" />
                        <label class="form-check-label" for="buff_server">Server 2
                            (<b><?=$row['service_price_server_1'];?> Coin</b>)<b class="text-warning"> (Active)</b></label>

                    </div>
                    <?php } ?>
                    <?php if ($row['service_price_server_2'] != 0) { ?>
                    <div class="form-check">
                        <input class="form-check-input" id="buff_server" type="radio" onchange="bill();" name="server"
                            value="3" data-bs-toggle="collapse" />
                        <label class="form-check-label" for="buff_server">Server 3
                            (<b><?=$row['service_price_server_2'];?> Coin</b>)<b class="text-warning"> (Active)</b></label>

                    </div>
                    <?php } ?>
                    <?php if ($row['service_price_server_3'] != 0) { ?>
                    <div class="form-check">
                        <input class="form-check-input" id="buff_server" type="radio" onchange="bill();" name="server"
                            value="4" data-bs-toggle="collapse" />
                        <label class="form-check-label" for="buff_server">Server 4
                            (<b><?=$row['service_price_server_3'];?> Coin</b>)<b class="text-warning"> (Active)</b></label>

                    </div>
                    <?php } ?>
                    <?php if ($row['service_price_server_4'] != 0) { ?>
                    <div class="form-check">
                        <input class="form-check-input" id="buff_server" type="radio" onchange="bill();" name="server"
                            value="5" data-bs-toggle="collapse" />
                        <label class="form-check-label" for="buff_server">Server 5
                            (<b><?=$row['service_price_server_4'];?> Coin</b>)<b class="text-warning"> (Active)</b></label>

                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label>Enter ID:</label>
                        <input type="text" id="buff_fb_id" name="idpost"  class="form-control"
                            placeholder="Enter ID Post You Want Increase" required="">
                        <label>[*] Get ID <code><a href="/tools/get-id">Click Here</a></code>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Quantity:</label>
                        <input type="number" id="buff_amount" name="amount" onkeyup="bill();" class="form-control"
                            placeholder="Enter The Quantity Need Buy" required="">
                    </div>
                    <div class="mb-3">
                        <label>Note:</label>
                        <textarea type="text" id="buff_note" class="form-control" rows="3"
                            placeholder="Enter Note (If Need)" required=""></textarea>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <center><strong>Total: <span id="total_payment" class="text-danger">0</span> Coin</strong>
                        </center>
                    </div>
                    <center>
                        <button type="button" class="btn btn-success btn-rounded me-1 mb-1" id="likepostFacebook"
                            onclick="like_post_facebook();"><i class="fa fa-dollar-sign"></i> Buy</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 mt-3 mt-lg-0">
            <div class="bg-holder bg-card page_speed_227445930"></div>
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar avatar-4xl rounded-circle border page_speed_1005751458"><img
                                class="rounded-circle"
                                src="https://github.com/AxeyedTran/kha_web/blob/main/people.png?raw=true"
                                width="100%" alt="user" data-pagespeed-url-hash="760951865"
                                onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></div>
                    </div>
                    <div class="col pl-0">
                        <h6 class="fs-0 mb-1"><?=$user_username;?></h6>
                        <div class="card bg-soft-success text-primary mb-1"><strong
                                class="p-1 font-sans-serif fs--1 text-center">Have: <strong
                                    class="text-danger"><?=number_format($user_point);?></strong> Coin</strong></div>
                        <div class="card bg-soft-info text-primary"><strong
                                class="p-1 font-sans-serif fs--1 text-center">Level: <?=$user_level_type;?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-0 overflow-hidden">
            <div class="bg-holder bg-card"></div>
            <div class="card-body position-relative">
                <div class="alert alert-info" role="alert">
                    <h5 class="alert-heading font-weight-semi-bold">Information</h5>
                    <?=$row['service_info'];?>
                </div>
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading font-weight-semi-bold">Warning</h5>
                    <?=$row['service_noted'];?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function like_post_facebook() {
    var buff_fb_id = $('#buff_fb_id').val();
    var buff_server = $('input[name=server]:checked').val();
    var buff_amount = $('#buff_amount').val();
    var buff_note = $('#buff_note').val();
    if (!buff_fb_id) {
        swal('The article link field cannot be left blank.', 'error');
        return;
    }
    if (!buff_server) {
        swal('The server field cannot be left blank.', 'error');
        return;
    }
    if (!buff_amount) {
        swal('The quantity field cannot be left blank.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'service/facebook/like-post/order',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: '<?=$row['service_slug'];?>',
            buff_fb_id: buff_fb_id,
            buff_server: buff_server,
            buff_amount: buff_amount,
            buff_note: buff_note
        },
        beforeSend: function() {
            wait('#likepostFacebook', false);
        },
        complete: function() {
            wait('#likepostFacebook', true, '<i class="fa fa-dollar-sign"></i> Buy');
        },
        success: (data) => {
            if (data.error) {
                swal(data.msg, "error");
            } else {
                swal(data.msg, "success");
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        }
    })
}
</script>
<script>
function bill() {
    var amount = $('[name=amount]').val();
    var server = $('input[name=server]:checked').val();
    if (server == 1) {
        var price = <?=$row['service_price'];?>;
    } else if (server == 2) {
        var price = <?=$row['service_price_server_1'];?>;
    } else if (server == 3) {
        var price = <?=$row['service_price_server_2'];?>;
    } else if (server == 4) {
        var price = <?=$row['service_price_server_3'];?>;
    } else if (server == 5) {
        var price = <?=$row['service_price_server_4'];?>;
    }
    var price = amount * price;
    var total_payment = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    $('#total_payment').html(formatNumber(total_payment));
}
$(document).ready(function() {
    bill();
});
</script>
<?php require_once '../../includes/footer.php'; ?>