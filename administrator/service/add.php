<?php
require_once '../../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level != 4){
    header('location: /home');
    die();
}
$title = 'Thêm dịch vụ';
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
                        Thêm dịch vụ</li>
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
                        <h5 class="mb-0">Thêm dịch vụ</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <p class="mb-0">
                <form action="" method="POST" accept-charset="utf-8" class="user">
                    <div class="row">
                        <div class="mb-3">
                            <label>Tiêu đề:</label>
                            <input id="service_title" type="text" class="form-control"
                                placeholder="Nhập tiêu đề dịch vụ" onkeyup="getSlug();">
                        </div>
                        <div class="mb-3">
                            <label>Liên kết:</label>
                            <input type="text" class="form-control" id="service_slug"
                                placeholder="Tự động nhập liên kết" autocomplete="off" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Loại dịch vụ:</label>
                            <input id="service_category" type="text" class="form-control"
                                placeholder="Nhập loại dịch vụ vd: facebook">
                        </div>
                        <div class="mb-3">
                            <label>Giá tiền:</label>
                            <input id="service_price" type="number" class="form-control" value="0"
                                placeholder="Nhập giá tiền">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 1:</label>
                            <input id="service_price_server_1" type="number" class="form-control" value="0"
                                placeholder="Nhập giá tiền server 1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 2:</label>
                            <input id="service_price_server_2" type="number" class="form-control" value="0"
                                placeholder="Nhập giá tiền server 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 3:</label>
                            <input id="service_price_server_3" type="number" class="form-control" value="0"
                                placeholder="Nhập giá tiền server 3">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Giá tiền server 4:</label>
                            <input id="service_price_server_4" type="number" class="form-control" value="0"
                                placeholder="Nhập giá tiền server 4">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Số lượng nhỏ nhất:</label>
                            <input id="service_min_amount" type="number" class="form-control"
                                placeholder="Nhập số lượng nhỏ nhất">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Số lượng lớn nhất:</label>
                            <input id="service_max_amount" type="number" class="form-control"
                                placeholder="Nhập số lượng lớn nhất">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Thông tin:</label>
                            <div class="min-vh-50">
                                <textarea class="tinymce d-none" id="service_info" rows="2"
                                    placeholder="Nhập nội dung..."></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lưu ý:</label>
                            <div class="min-vh-50">
                                <textarea class="tinymce d-none" id="service_noted" rows="2"
                                    placeholder="Nhập nội dung..."></textarea>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <center>
                        <button type="button" class="btn btn-success btn-rounded btn-block" id="serviceAdd"
                            onclick="service_add();"><i class="fa fa-info"></i> Thực hiện</button>
                    </center>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function getSlug() {
    var service_title, service_slug;

    //Lấy text từ thẻ input title 
    service_title = document.getElementById("service_title").value;

    //Đổi chữ hoa thành chữ thường
    service_slug = service_title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    service_slug = service_slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    service_slug = service_slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    service_slug = service_slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    service_slug = service_slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    service_slug = service_slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    service_slug = service_slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    service_slug = service_slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    service_slug = service_slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    service_slug = service_slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    service_slug = service_slug.replace(/\-\-\-\-\-/gi, '-');
    service_slug = service_slug.replace(/\-\-\-\-/gi, '-');
    service_slug = service_slug.replace(/\-\-\-/gi, '-');
    service_slug = service_slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    service_slug = '@' + service_slug + '@';
    service_slug = service_slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('service_slug').value = service_slug;
}

function service_add() {
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
        url: WEBSITE_URL + prefix + 'administrator/service/add',
        type: 'POST',
        dataType: 'JSON',
        data: {
            type: 'service_add',
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
            wait('#serviceAdd', false);
        },
        complete: function() {
            wait('#serviceAdd', true, '<i class="fa fa-info"></i> Thực hiện');
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
<script src="/assets/js/ckeditor/ckeditor.js"></script>
<?php require_once '../../includes/footer.php'; ?>