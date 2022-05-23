$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('[data-toggle="tooltip"]').tooltip();
    $("form[submit-ajax=hvl]").submit(function (e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let href = $(_this).attr("href");
        let api_token = $(_this).attr("api_token");
        let data = $(_this).serialize();
        let button = $(_this).find("button[type=submit]");
        submitForm(url, method, href, api_token, data, button);
    });
    $.each($(".dataTables-hvl"), function (indexInArray, valueOfElement) {
        let setting = {
            order: [],
            stateSave: true,
            destroy: true,
            scrollY: "50vh",
            scrollCollapse: true,
            language: {
                search: "Tìm Kiếm",
                zeroRecords: "<center>Không tìm thấy kết quả dữ liệu</center>",
                info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                infoEmpty: "Hiển thị 0 đến 0 của 0 mục",
                lengthMenu: "Hiển thị _MENU_ mục",
                infoFiltered: "(Được lọc từ _MAX_ mục)",
                loadingRecords: "Đang lấy dữ liệu...",
                paginate: {
                    previous: "<i class='fa fa-chevron-left'>",
                    next: "<i class='fa fa-chevron-right'>",
                },
                emptyTable: "<center>Không có dữ liệu để hiển thị</center>",
            },
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"],
            ],
        };
        let api = $(this).attr("ajax-api");
        if (api) {
            let config = JSON.parse(api);
            let api_token = config.api_token;
            setting["processing"] = true;
            let ajaxConfig = {
                type: config.method,
                url: config.url,
                data: config.data ?? {},
                dataType: "json",
            };
            if (api_token) {
                ajaxConfig["headers"] = {
                    "Api-Token": api_token,
                };
            }
            setting["ajax"] = ajaxConfig;
            setting["columns"] = window[`${$(this).attr("columns")}`]();
        }
        $(this).DataTable(setting);
    });
});

function swal(text, icon) {
    Swal.fire({
        icon,
        title: "Notification",
        text,
        confirmButtonText: "OK!",
    });
}

function submitForm(url, method, href, api_token, data, button) {
    let textButton = button.html().trim();
    let setting = {
        type: method,
        url,
        data,
        dataType: "json",
        beforeSend: function () {
            button
                .prop("disabled", !0)
                .html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');
        },
        complete: function () {
            button.prop("disabled", !1).html(textButton);
        },
        success: function (response) {
            swal(
                response.message,
                response.status === true ? "success" : "error"
            );
            if (response.status === true) {
                setTimeout(() => {
                    if (!href) {
                        window.location.reload();
                        return;
                    }
                    window.location.href = href;
                }, 2000);
            }
        },
        error: function (error) {
            console.log(error);
        },
    };
    if (api_token) {
        setting["headers"] = {
            "Api-Token": api_token,
        };
    }
    $.ajax(setting);
}

function getTime() {
    return parseInt(new Date().getTime() / 1000);
}

function wait(t, e, n) {
    return e
        ? $(t).prop("disabled", !1).html(n)
        : $(t)
              .prop("disabled", !0)
              .html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');
}

function formatNumber(nStr, decSeperate = ".", groupSeperate = ",") {
    nStr += "";
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + groupSeperate + "$2");
    }
    return x1 + x2;
}

function coppy(element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    swal("Sao chép thành công", "success");
}

function statusOrder(status) {
    let msg = "";
    switch (status) {
        case "Success":
            msg =
                '<button type="button" class="btn btn-success btn-sm">Đã hoàn thành</button>';
            break;
        case "Pause":
            msg =
                '<button type="button" class="btn btn-danger btn-sm">Đã hủy</button>';
            break;
        case "Waiting":
            msg =
                '<button type="button" class="btn btn-warning btn-sm">Chờ hủy</button>';
            break;
        case "Expired":
            msg =
                '<button type="button" class="btn btn-danger btn-sm">Đã hết hạn</button>';
            break;
        case "CookieDie":
            msg =
                '<button type="button" class="btn btn-danger btn-sm">Cookie die</button>';
            break;
        case "ProxyError":
            msg =
                '<button type="button" class="btn btn-warning btn-sm">Proxy lỗi</button>';
            break;
        default:
            msg =
                '<button type="button" class="btn btn-info btn-sm">Đang hoạt động</button>';
            break;
    }
    return msg;
}

function timeCreated(date) {
    return moment(date).format("YYYY-MM-DD HH:mm:ss");
}
function isURL(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return pattern.test(str);
  }