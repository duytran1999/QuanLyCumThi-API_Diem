<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    //Lay SBD
    $sql = "SELECT * FROM `dscumthi`";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            $response["data"] = $data;
            $response["message"] = "success";
            $response["data_length"] = count($data);
            echo json_encode($response);
        } else {
            $response["data"] = [];
            $response["message"] = "empty_data";
            $response["data_length"] = 0;
            echo json_encode($response);
        }
    }
?>