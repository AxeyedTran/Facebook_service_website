<?php
require_once '../../_config.php';
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
$title = 'Chỉnh sửa dịch vụ';
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
                        Chỉnh sửa dịch vụ</li>
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
                        <h5 class="mb-0">Chỉnh sửa dịch vụ #<?=$row['service_title'];?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <div class="row">

                        <div class="mb-3">
                            <label>Tiêu đề:</label>
                            <input type="text" class="form-control" id="service_title"
                                value="<?=$row['service_title'];?>" placeholder="Nhập tiêu đề dịch vụ">
                        </div>
                        <div class="mb-3">
                            <label>Liên kết:</label>
                            <input type="text" class="form-control" id="service_slug" value="<?=$row['service_slug'];?>"
                                placeholder="Nhập liên kết dịch vụ">
                        </div>
                        <div class="mb-3">
                            <label>Loại dịch vụ:</label>
                            <input type="text" class="form-control" id="service_category"
                                value="<?=$row['service_category'];?>" placeholder="Nhập loại dịch vụ">
                        </div>
                        <div class="md-3">
                            <label>Giá tiền:</label>
                            <input id="service_price" type="number" class="form-control"
                                value="<?=$row['service_price'];?>" placeholder="Nhập giá tiền">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 1:</label>
                            <input id="service_price_server_1" type="number" class="form-control"
                                value="<?=$row['service_price_server_1'];?>" placeholder="Nhập giá tiền server 1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 2:</label>
                            <input id="service_price_server_2" type="number" class="form-control"
                                value="<?=$row['service_price_server_2'];?>" placeholder="Nhập giá tiền server 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 3:</label>
                            <input id="service_price_server_3" type="number" class="form-control"
                                value="<?=$row['service_price_server_3'];?>" placeholder="Nhập giá tiền server 3">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 4:</label>
                            <input id="service_price_server_4" type="number" class="form-control"
                                value="<?=$row['service_price_server_4'];?>" placeholder="Nhập giá tiền server 4">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Số lượng nhỏ nhất:</label>
                            <input id="service_min_amount" type="number" class="form-control"
                                value="<?=$row['service_min_amount'];?>" placeholder="Nhập số lượng nhỏ nhất">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Số lượng lớn nhất:</label>
                            <input id="service_max_amount" type="number" class="form-control"
                                value="<?=$row['service_max_amount'];?>" placeholder="Nhập số lượng lớn nhất">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Thông tin:</label>
                            <div class="min-vh-50">
                                <textarea class="tinymce d-none" id="service_info" rows="2"
                                    placeholder="Nhập nội dung..."><?=$row['service_info'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lưu ý:</label>
                            <div class="min-vh-50">
                                <textarea class="tinymce d-none" id="service_noted" rows="2"
                                    placeholder="Nhập nội dung..."><?=$row['service_noted'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <br />
                    <center>
                        <button type="button" class="btn btn-info btn-rounded btn-block" id="serviceEdit"
                            onclick="service_edit();"><i class="fa fa-info"></i> Lưu thông tin</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function service_edit() {
    var service_title = $('#service_title').val();
    var service_slug = $('#service_slug').val();
    var service_category = $('#service_category').val();
    var service_price = $('#service_price').val();
    var service_price_server_1 = $('#service_price_server_1').val();
    var service_price_server_2 = $('#service_price_server_2').val();
    var service_price_server_3 = $('#service_price_server_3').val();
    var service_price_server_4 = $('#service_price_server_4').val();
    var service_min_amount = $('#service_min_amount').val();
    var service_max_amount = $('#service_max_amount').val();
    var service_info = tinymce.get('service_info').getContent();
    var service_noted = tinymce.get('service_noted').getContent();
    if (!service_title) {
        swal('Trường tiêu đề không được bỏ trống.', 'error');
        return;
    }
    if (!service_category) {
        swal('Trường loại dịch vụ không được bỏ trống.', 'error');
        return;
    }
    if (!service_min_amount) {
        swal('Trường số lượng nhỏ nhất không được bỏ trống.', 'error');
        return;
    }
    if (!service_max_amount) {
        swal('Trường số lượng lớn nhất không được bỏ trống.', 'error');
        return;
    }
    $.ajax({
        url: WEBSITE_URL + prefix + 'administrator/service/edit',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'service_edit',
            service_id: <?=$row['service_id'];?>,
            service_title: service_title,
            service_slug: service_slug,
            service_category: service_category,
            service_price: service_price,
            service_price_server_1: service_price_server_1,
            service_price_server_2: service_price_server_2,
            service_price_server_3: service_price_server_3,
            service_price_server_4: service_price_server_4,
            service_min_amount: service_min_amount,
            service_max_amount: service_max_amount,
            service_info: service_info,
            service_noted: service_noted
        },
        beforeSend: function() {
            wait('#serviceEdit', false);
        },
        complete: function() {
            wait('#serviceEdit', true, '<i class="fa fa-info"></i> Thực hiện');
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