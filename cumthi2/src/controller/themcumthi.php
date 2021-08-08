<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    if (isset($_POST['tencumthi'])) {
        $data_response = array();
        $insert_cumthi_string="
            insert into dscumthi(TenCumThi,Link)
            values ('".$_POST['tencumthi']."','".$_POST['duongdancumthi']."')";
        if (strlen($_POST['tencumthi']) == 0) {
            $data_response["message"] = "required_tencumthi";
            echo json_encode($data_response);
        } else if (strlen($_POST['duongdancumthi']) == 0) {
            $data_response["message"] = "required_duongdancumthi";
            echo json_encode($data_response);
        } else {
            if($cumthi=$conn->query($insert_cumthi_string)){
                $data_response["message"] = "add_cumthi_success";
                echo json_encode($data_response);
            }else{
                $data_response["message"] = "add_cumthi_error";
                echo json_encode($data_response);
            }
        }
    }
?>