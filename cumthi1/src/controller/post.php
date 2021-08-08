<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    include_once('../constant/key.php');

    use Firebase\JWT\JWT;
    function verifyToken($key,$algorithm){
        $http_header=apache_request_headers();
        if(isset( $http_header['Authorization'])){
            $bearer=explode(' ',$http_header['Authorization']);
            try {
                $decoded =JWT::decode($bearer[1],$key,$algorithm );
                return $decoded;
            } catch (\Throwable $th) {
                 return "token_error";
            }
        }else{
            return "cant_auth_user";
        }
    }

    if(isset($_POST["post_content"])){
        $checkAuth=verifyToken(secret_key, array('HS256'));
        $response=array();
        if($checkAuth=="token_error"){
            $response["message"]="token_error";
            echo json_encode($response);
        }else if($checkAuth=="cant_auth_user"){
            $response["message"]="cant_auth_user";
            echo json_encode($response);
        }else{
            $content=$_POST['post_content'];
            $sql="
                INSERT INTO posts(user_id,post_content)
                VALUES($checkAuth->id,'$content')
            ";
            if($result=$conn->query($sql)){
                $response["message"]="add_success";
                echo json_encode($response);
            }else{
                $response["message"]="add_error";
                echo json_encode($response);
            }
            //echo json_encode($checkAuth);
        }
    }
?>