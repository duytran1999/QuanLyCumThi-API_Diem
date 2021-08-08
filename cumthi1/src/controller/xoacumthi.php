<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    $response=array();
    if(isset($_GET["id"])){
        $sql_string="DELETE FROM dscumthi WHERE MaCT=".$_GET['id'];
        if($result=$conn->query($sql_string)){
            $response["message"] = "delete_cumthi_success";
            echo json_encode($response);
        }else{
            $response["message"] = "delete_cumthi_error";
            echo json_encode($response);
        }
    }else{
        $response["message"] = "missing_id_cumthi";
        echo json_encode($response);
    }
?>