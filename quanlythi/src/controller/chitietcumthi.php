<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    if (isset($_GET['id'])) {
        $data_response = array();
        $queryString = "SELECT * FROM dscumthi where MaCT='" . $_GET["id"] . "'";
        if ($cumthi = $conn->query($queryString)) {
            if($cumthi->num_rows==1){
                $data=array();
                $response["data"]=$cumthi-> fetch_assoc();
                $response["message"]="success";
                $response["data_length"]=1;
                echo json_encode($response);
            }else{
                $response["message"]="id_doesnt_match";
                $response["data_length"]=0;
                echo json_encode($response);
            }
        } else {
            $response["message"]="error";
            $response["data_length"]=0;
            echo json_encode($response);
        }
    }
?>