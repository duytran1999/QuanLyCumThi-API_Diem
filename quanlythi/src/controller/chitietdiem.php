<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    //Lay SBD
    if(isset($_GET["SBD"])){
        $response=array();
        $keyword_search=$_GET['SBD'];
        $keyword_match=str_replace('"',"", $keyword_search);
        $sql="SELECT ts.SBD, ts.HoTen,ts.NgaySinh,ts.GioiTinh,mt.TenMonThi,dt.Diem From thi_sinh as ts , diem_thi as dt, monthi as mt WHERE  (ts.SBD=dt.SBD and dt.MAMT=mt.MaMT) and(ts.SBD = '$keyword_match')";
        if($result=$conn->query($sql)){
            if($result->num_rows>0){
                $data=array();
                while($row=$result-> fetch_assoc()){
                    array_push($data,$row);
                }
                $response["data"]=$data;
                $response["message"]="success";
                $response["data_length"]=count($data);
                echo json_encode($response);
            }else{
                $response["data"]=[];
                $response["message"]="empty_data";
                $response["data_length"]=0;
                echo json_encode($response);
            }
        }
    }else{
        $response["data"]=[];
        $response["message"]="missing_param_sbd";
        $response["data_length"]=0;
        echo json_encode($response);
    }
?>