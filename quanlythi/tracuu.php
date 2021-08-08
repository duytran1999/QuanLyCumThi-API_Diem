<?php
include_once("./path.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Cứu Điểm Thi</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="./src/assets/app.js"></script> -->
    <script>
        $(document).ready(function() {
            $.get("http://localhost:8080/quanlythi/src/controller/cumthi.php", {}, function(data) {
                response = JSON.parse(data.slice(1))
                var data_cumthi = "<option value='all'>Tất Cả</option>";
                $.each(response.data, function(i, item) {
                    data_cumthi += `<option value=${item.MaCT}>${item.TenCumThi}</option>`;
                })
                $('#listCumthi').append(data_cumthi);
            });
            $("#btn-search").click(function() {
                let keyword_search = $("#input-search").val()
                if (keyword_search.length == 0) {
                    alert("Nhập từ khóa cần tìm kiếm");
                } else {
                    if ($("#listCumthi").val() === 'all') {
                        $.ajax({
                            method: "GET",
                            url: "http://localhost:8080/quanlythi/src/controller/cumthi.php",
                            success: function(data) {
                                total_data_response_api_cum_thi = ''
                                temp = 0;
                                $('#diemthi').empty();
                                response = JSON.parse(data.slice(1));
                                $.each(response.data, function(i, item) {
                                    $.ajax({
                                        method: "GET",
                                        url: item.Link + `/src/controller/danhsachdiem.php?page=1&p="${keyword_search}"`,
                                        success: function(fetched) {
                                            data_cum_thi = JSON.parse(fetched.slice(1));
                                            $.each(data_cum_thi.data, function(index, cumthi) {
                                                total_data_response_api_cum_thi += "<tr>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.SBD + "</td>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.HoTen + "</td>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.NgaySinh + "</td>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.GioiTinh + "</td>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.TenMonThi + "</td>";
                                                total_data_response_api_cum_thi += "<td>" + cumthi.Diem + "</td>";
                                                total_data_response_api_cum_thi += "</tr>";
                                            })
                                            temp+=1;
                                            if(response.data_length===temp){
                                                $('#diemthi').append(total_data_response_api_cum_thi);
                                            }
                                        }
                                    })
                                })

                            }
                        })
                    } else {
                        $.ajax({
                            method: "GET",
                            url: `http://localhost:8080/cumthi${$("#listCumthi").val()}/src/controller/danhsachdiem.php?page=1&page_size=10&p="${keyword_search}"`,
                            success: function(data) {
                                var data_student = "";
                                $('#diemthi').empty();
                                response = JSON.parse(data.slice(1))
                                $.each(response.data, function(i, item) {
                                    data_student += "<tr>";
                                    data_student += "<td>" + item.SBD + "</td>";
                                    data_student += "<td>" + item.HoTen + "</td>";
                                    data_student += "<td>" + item.NgaySinh + "</td>";
                                    data_student += "<td>" + item.GioiTinh + "</td>";
                                    data_student += "<td>" + item.TenMonThi + "</td>";
                                    data_student += "<td>" + item.Diem + "</td>";
                                    data_student += "</tr>";
                                })
                                $('#diemthi').append(data_student);
                            }
                        })
                    }
                }
            });
        })
    </script>
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="page-title">Tra Cứu Điểm Thi</h2>
        </header>

        <main>
            <div class="input-group rounded">
                <select name="listCumthi" id="listCumthi" style="width: 150px;">
                </select>
                <input type="search" id="input-search" class="form-control rounded" placeholder="Nhập Từ Khóa Tìm Kiếm" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-primary" id="btn-search"> <i class="fas fa-search"></i></button>
            </div>
            <div class="text-center" style="margin-top:30px">
                <table class="table">
                    <thead>
                        <th>Số báo Danh</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Môn Thi</th>
                        <th>Điểm</th>
                    </thead>
                    <tbody id="diemthi">

                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>