<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    include_once('../constant/key.php');
    use Firebase\JWT\JWT;
    
    if(isset($_POST['role'])){
        if($_POST['role']=="user"){
            $response=array();
            $email=strval($_POST['email']);
            $password=strval($_POST['password']);
            $sql = "SELECT * FROM users WHERE email='$email'";
            if ($result = $conn -> query($sql)) {
                if($result->num_rows==1){
                    $user_fetch=$result-> fetch_assoc();
                    if(password_verify($password,$user_fetch['password'])){
                        $payload = array(
                            "id" => $user_fetch["id"],
                            "email" => $user_fetch["email"],
                            "username" => $user_fetch["username"],
                            "role"=>$user_fetch["role"]
                        );
                        $jwt = JWT::encode($payload,secret_key);
                        $response['message']="login_success";
                        $response['access_token']=$jwt;
                        echo json_encode($response);
                        //$decoded = JWT::decode($jwt, $key, array('HS256'));
                    }else{
                        $response['message']="password_incorrect";
                        echo json_encode($response);
                    }
                }else{
                    $response['message']="email_not_exist";
                    echo json_encode($response);
                }
            }
        }
    }
?>