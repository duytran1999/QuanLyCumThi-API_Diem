$(document).ready(function() {
    function getData() {
        $.get("http://localhost:8080/quanlythi/src/controller/cumthi.php", {}, function(data) {
            response = JSON.parse(data.slice(1))
            $(function() {
                var data_cumthi = "";
                $.each(response.data, function(i, item) {
                    data_cumthi += "<tr>";
                    data_cumthi += "<td>" + (parseInt(i) + 1) + "</td>";
                    data_cumthi += "<td>" + item.TenCumThi + "</td>";
                    data_cumthi += `<td><a href="${item.Link}">${item.Link}</a></td>`;
                    data_cumthi += "<td><button type='button' class='btn-edit btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalEditCumThi' data-bs-whatever='@mdo' data-sid=" + item.MaCT + ">Chỉnh Sửa</button></td>";
                    data_cumthi += "<td><button type='button' class='btn-delete btn btn-danger' data-sid=" + item.MaCT + ">Xóa</button></td>";
                    data_cumthi += "</tr>";
                })
                $('#cumthi').append(data_cumthi);
            })
        });

    }
    getData();
    $("#add-cumthi").click(function() {
        const tenCumThi = $("#ten-cum-thi").val();
        const duongDanCumThi = $("#duong-dan-cum-thi").val();
        $.ajax({
            method: "POST",
            url: "http://localhost:8080/quanlythi/src/controller/themcumthi.php",
            data: {
                "tencumthi": tenCumThi,
                "duongdancumthi": duongDanCumThi,
            },
            success: function(data) {
                response = JSON.parse(data.slice(1))
                switch (response.message) {
                    case "required_tencumthi":
                        $("#show_error").html("Yêu Cầu Nhập Tên Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    case "required_duongdancumthi":
                        $("#show_error").html("Yêu Cầu Nhập Đường Dẫn Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    case "add_cumthi_success":
                        $("#close-modal").click();
                        $("#cumthi").empty();
                        getData();
                        $("#show_success").addClass(" btn btn-success w-100 p-3")
                        $("#show_success").html("Thêm Cụm Thi Thành Công").fadeIn(1).fadeOut(2000)
                        break;
                    case "add_cumthi_error":
                        $("#ten-cum-thi").val("");
                        $("#duong-dan-cum-thi").val("");
                        $("#show_error").html("Lỗi Khi Thêm Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    default:
                        break;
                }
            }
        })
    });
    $("#close-modal").click(function() {
        $("#ten-cum-thi").val("");
        $("#duong-dan-cum-thi").val("");
    })
    $("tbody").on("click", ".btn-delete", function() {
        let id = $(this).attr("data-sid")
        $.ajax({
            method: "GET",
            url: `http://localhost:8080/quanlythi/src/controller/xoacumthi.php?id=${id}`,
            success: function(data) {
                response = JSON.parse(data.slice(1))
                switch (response.message) {
                    case "delete_cumthi_success":
                        $("#cumthi").empty();
                        getData();
                        $("#show_success").addClass(" btn btn-success w-100 p-3")
                        $("#show_success").html("Xóa Cụm Thi Thành Công").fadeIn(1).fadeOut(2000)
                        break;
                    case "delete_cumthi_error":
                        console.log("Loi khi xoa cum thi");
                        break;
                    default:
                        break;
                }
            }
        })
    })
    $("tbody").on("click", ".btn-edit", function() {
        let id = $(this).attr("data-sid")
        $.ajax({
            method: "GET",
            url: `http://localhost:8080/quanlythi/src/controller/chitietcumthi.php?id=${id}`,
            success: function(data) {
                response = JSON.parse(data.slice(1))
                if (response.message == "id_doesnt_match") {
                    location.reload();
                } else if (response.message == "error") {
                    location.reload();
                } else {
                    $("#edit-ten-cum-thi").val(response.data.TenCumThi)
                    $("#edit-duong-dan-cum-thi").val(response.data.Link)
                    $("#edit-mact").val(id)
                }
            }
        })
    })
    $("#update-cumthi").click(function() {
        $.ajax({
            method: "POST",
            url: "http://localhost:8080/quanlythi/src/controller/capnhatcumthi.php",
            data: {
                "tencumthi": $("#edit-ten-cum-thi").val(),
                "duongdancumthi": $("#edit-duong-dan-cum-thi").val(),
                "mact": $("#edit-mact").val()
            },
            success: function(data) {
                response = JSON.parse(data.slice(1))
                switch (response.message) {
                    case "required_tencumthi":
                        $("#show_error-update").html("Yêu Cầu Nhập Tên Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    case "required_duongdancumthi":
                        $("#show_error-update").html("Yêu Cầu Nhập Đường Dẫn Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    case "update_cumthi_success":
                        $("#close-modal-edit").click();
                        $("#cumthi").empty();
                        getData();
                        $("#show_success").addClass(" btn btn-success w-100 p-3")
                        $("#show_success").html("Cập Nhật Cụm Thi Thành Công").fadeIn(1).fadeOut(2000)
                        break;
                    case "update_cumthi_error":
                        $("#ten-cum-thi").val("");
                        $("#duong-dan-cum-thi").val("");
                        $("#show_error-update").html("Lỗi Khi Cập Nhật Cụm Thi").fadeIn(1).fadeOut(2000)
                        break;
                    default:
                        break;
                }
            }
        })
    })
})