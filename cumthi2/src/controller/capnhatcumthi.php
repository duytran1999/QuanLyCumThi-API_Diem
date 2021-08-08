<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    if (isset($_POST['tencumthi'])) {
        $data_response = array();
        $update_cumthi_string = "UPDATE dscumthi SET TenCumThi = '" . $_POST['tencumthi'] . "', Link = '" . $_POST['duongdancumthi'] . "' WHERE MaCT=" . $_POST['mact'];
       
        if (strlen($_POST['tencumthi']) == 0) {
            $data_response["message"] = "required_tencumthi";
            echo json_encode($data_response);
        } else if (strlen($_POST['duongdancumthi']) == 0) {
            $data_response["message"] = "required_duongdancumthi";
            echo json_encode($data_response);
        } else {
            if ($cumthi = $conn->query($update_cumthi_string)) {
                $data_response["message"] = "update_cumthi_success";
                echo json_encode($data_response);
            } else {
                $data_response["message"] = "update_cumthi_error";
                echo json_encode($data_response);
            }
        }
    }
?>