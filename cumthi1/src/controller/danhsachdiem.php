<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');

    
    //Lay trang 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    }
    //Lay kich thuoc trang ( so dong du lieu )
    $page_size = isset($_GET['page_size']) ? (int)$_GET['page_size'] : 1000;
    if ($page_size < 1) {
        $page_size = 4;
    }
    //Lay p (p: search keyword)
    $offset = ($page-1) * $page_size;
    $response=array();
    if(isset($_GET['p'])){
        $keyword_search=$_GET['p'];
        $keyword_search=str_replace('"',"", $keyword_search);
        $keyword_match='%'.$keyword_search.'%';
        $sql="SELECT ts.SBD,ts.HoTen,ts.NgaySinh,ts.GioiTinh,dt.MaBT,mt.TenMonThi,dt.Diem From thi_sinh as ts , diem_thi as dt ,monthi as mt WHERE ts.SBD=dt.SBD and dt.MAMT=mt.MaMT and (ts.HoTen Like '$keyword_match' or dt.SBD Like '$keyword_match') LIMIT  $offset,$page_size";
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
        //tra ve khong co tu search key word
        $sql="SELECT * From thi_sinh as ts , diem_thi as dt WHERE ts.SBD=dt.SBD  LIMIT  $offset,$page_size";
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
    }
?>