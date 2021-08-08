<?php
include_once("./path.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Cụm Thi</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./src/assets/app.js"></script>
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="page-title">Danh Sách Cụm Thi</h2>
        </header>

        <main class="">

            <div class="d-flex justify-content-between">

                <!-- Nút để hiện thị modal Thêm Cụm Thi -->
                <a href="<?php echo BASE_URL . "/tracuu.php" ?>"><button type="button" class="btn btn-primary">Tra Cứu Điểm</button></a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Thêm Cụm Thi</button>
                <!-- Modal thêm cụm thi -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cụm Thi Mới</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Thêm Cụm Thi
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Tên Cụm Thi:</label>
                                        <textarea type="text" class="form-control" id="ten-cum-thi"></textarea>
                                        <div id="showErrorTenCumThi"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Đường Dẫn Cụm Thi:</label>
                                        <input class="form-control" id="duong-dan-cum-thi">
                                        <div id="showErrorDuongDanCumThi"></div>
                                    </div>
                                    <p class="text-danger text-uppercase fw-bold" id="show_error"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal">Đóng</button>
                                <button type="button" class="btn btn-primary" id="add-cumthi">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Chỉnh Sửa Cụm Thi -->
                <div class="modal fade" id="modalEditCumThi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Cụm Thi</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditCumThi">
                                    Chỉnh Sửa Cụm Thi
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Tên Cụm Thi:</label>
                                        <textarea type="text" class="form-control" id="edit-ten-cum-thi"></textarea>
                                        <div id="showErrorTenCumThi"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Đường Dẫn Cụm Thi:</label>
                                        <input class="form-control" id="edit-duong-dan-cum-thi">
                                        <input id="edit-mact" type="hidden">
                                        <div id="showErrorDuongDanCumThi"></div>
                                    </div>
                                    <p class="text-danger text-uppercase fw-bold" id="show_error-update"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal-edit">Đóng</button>
                                <button type="button" class="btn btn-primary" id="update-cumthi">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hiện Thị Thông Báo Khi Thêm Thành Công -->
            <div class="text-white text-uppercase fw-bold" style="margin-top:10px" id="show_success"></div>
            <!-- Hiện Thị Danh Sách Cụm Thi -->
            <table class="table">
                <thead>
                    <th>Mã Cụm Thi</th>
                    <th>Tên Cụm Thi</th>
                    <th>Link</th>
                    <th colspan="2">Chức Năng</th>
                </thead>
                <tbody id="cumthi">
                </tbody>
            </table>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>