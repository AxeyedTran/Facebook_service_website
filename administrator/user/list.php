<?php
require_once '../../_config.php';
if ($kdh == false) {
    header('location: /auth/login');
    die();
} else if($user_level != 4){
    header('location: /home');
    die();
}
$title = 'User List | KDH Team';
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
                        Danh sách người dùng</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header bg-light">
        <h5 class="mb-0">Danh sách người dùng</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive scrollbar" id="history"
            data-list='{"valueNames":["id","time","hd","sd"],"page":10,"pagination":true}'>
            <div class="mb-3">
                <input class="search form-control" placeholder="Search" />
            </div>
            <table class="table table-bordered table-striped fs--1">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort" data-sort="id"><b>#</b>
                        </th>
                        <th class="sort" data-sort="sd"><b>Thời gian</b>
                        </th>
                        <th class="sort" data-sort="time"><b>Họ và tên</b>
                        </th>
                        <th class="sort" data-sort="hd"><b>Tài khoản</b>
                        </th>
                        <th class="sort" data-sort="hd"><b>Số điện thoại</b>
                        </th>
                        <th class="sort" data-sort="sd"><b>Số tiền</b>
                        </th>
                        <th class="sort" data-sort="sd"><b>Trạng thái</b>
                        </th>
                        <th class="sort" data-sort="sd"><b>Cấp độ</b>
                        </th>
                        <th class="sort" data-sort="sd"><b>Thao tác</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $result = mysqli_query($conn, "SELECT * FROM table_user ORDER BY user_id DESC LIMIT 0,100");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['user_blocked'] == '1') {
                            $user_blocked = '<a style="color: red;font-weight: bold" onclick="user_unblocked('.$row['user_id'].');">Khóa</a>';
                        } else if ($row['user_blocked'] == '0') {
                            $user_blocked = '<a style="color: green;font-weight: bold" onclick="user_blocked('.$row['user_id'].');">Hoạt động</a>';
                        }
                        if ($row['user_level'] == '1') {
                            $user_level = '<a style="color: gray;font-weight: bold">Thành viên</a>';
                        } else if ($row['user_level'] == '2') {
                            $user_level = '<a style="color: red;font-weight: bold">Cộng tác viên</a>';
                        } else if ($row['user_level'] == '3') {
                            $user_level = '<a style="color: green;font-weight: bold">Đại lý</a>';
                        } else if ($row['user_level'] == '4') {
                            $user_level = '<a style="color: blue;font-weight: bold">Quản trị viên</a>';
                        }                
                    ?>
                    <tr>
                        <td><?=$row['user_id']?></td>
                        <td><?=date('d-m-Y', $row['user_time']);?></td>
                        <td><?=$row['user_fullname']?></td>
                        <td><?=$row['user_username']?></td>
                        <td><?=$row['user_phone']?></td>
                        <td><?=number_format($row['user_point'])?></td>
                        <td><?=$user_blocked?></td>
                        <td><?=$user_level?></td>
                        <td class="align-middle white-space-nowrap">
                            <div class="dropdown text-sans-serif">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3"
                                    type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h fs--1"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                                    <div class="bg-white py-2">
                                        <a class="dropdown-item" onclick="user_delete(<?=$row['user_id']?>);">Xóa bỏ</a>
                                        <a class="dropdown-item"
                                            href="/administrator/user/edit/id-<?=$row['user_id']?>">Chỉnh sửa</a>
                                        <a class="dropdown-item"
                                            href="https://www.facebook.com/KDH.IT<?=$row['user_fb']?>">Trang cá nhân</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span>
                </button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
function user_delete(id) {
    Swal.fire({
        icon: 'info',
        title: 'Xác nhận?',
        text: `Bạn có chắc muốn xóa người dùng có id ${id}?`,
        showDenyButton: true,
        confirmButtonText: 'OK!',
        denyButtonText: `Cancel`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: WEBSITE_URL + prefix + 'administrator/user/delete',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    type: 'user_delete',
                    user_id: id
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
            });
        } else if (result.isDenied) {
            swal("Bạn đã nhấn hủy.", "error");
        }
    });
}

function user_blocked(id) {
    Swal.fire({
        icon: 'info',
        title: 'Xác nhận?',
        text: `Bạn có chắc muốn khóa người dùng có id ${id}?`,
        showDenyButton: true,
        confirmButtonText: 'OK!',
        denyButtonText: `Cancel`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: WEBSITE_URL + prefix + 'administrator/user/blocked',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    type: 'user_blocked',
                    user_id: id
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
            });
        } else if (result.isDenied) {
            swal("Bạn đã nhấn hủy.", "error");
        }
    });
}

function user_unblocked(id) {
    Swal.fire({
        icon: 'info',
        title: 'Xác nhận?',
        text: `Bạn có chắc muốn mở khóa người dùng có id ${id}?`,
        showDenyButton: true,
        confirmButtonText: 'OK!',
        denyButtonText: `Cancel`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: WEBSITE_URL + prefix + 'administrator/user/unblocked',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    type: 'user_unblocked',
                    user_id: id
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
            });
        } else if (result.isDenied) {
            swal("Bạn đã nhấn hủy.", "error");
        }
    });
}
</script>
<?php require_once '../../includes/footer.php'; ?>