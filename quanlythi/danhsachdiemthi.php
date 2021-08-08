<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get("http://localhost:8080/quanlythi/src/controller/chitietdiem.php?SBD=02.0001", {}, function(data) {
                response = JSON.parse(data.slice(1))
                $(function() {
                    var data_student = "";
                    $.each(response.data, function(i, item) {
                        data_student += "<tr>";
                        data_student += "<td>" + item.SBD + "</td>";
                        data_student += "<td>" + item.HoTen + "</td>";
                        data_student += "<td>" + item.NgaySinh + "</td>";
                        data_student += "<td>" + item.GioiTinh + "</td>";
                        data_student += "<td>" + item.TenMonThi + "</td>";
                        data_student += "<td>" + item.Diem + "</td>";
                        data_student += "<td><a href='' class='edit'>view</a></td>";
                        data_student += "<td><a href='' class='edit'>edit</a></td>";
                        data_student += "<td><a href='' class='edit'>delete</a></td>";
                        data_student += "</tr>";
                    })
                    $('#diemthi').append(data_student);
                })
            });
        })
    </script>
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="page-title">Notifications</h2>
        </header>
        <div class="text-center">
            <table class="table">
                <thead>
                    <th>Số báo Danh</th>
                    <th>Họ Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Môn Thi</th>
                    <th>Điểm</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody id="diemthi">

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>