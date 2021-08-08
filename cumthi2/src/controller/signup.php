<?php
    include_once('../database/db.php');
    include_once('../vendor/vendor/firebase/php-jwt/src/JWT.php');
    

    if(isset($_POST['role'])){
        if($_POST['role']=="user"){
            $response=array();
                $username=strval($_POST['username']);
                $email=strval($_POST['email']);
                //$_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
                $password=strval(password_hash($_POST['password'],PASSWORD_DEFAULT));
                $sql = "SELECT * FROM users WHERE email='$email'";
                $insert_string="insert into users(username,email,password,role) values ('$username','$email','$password','1')";
                if ($result = $conn -> query($sql)) {
                   if($result -> num_rows>0){
                    $response['message']="account_exists";
                    echo json_encode($response);
                   }else{
                       $conn->query($insert_string);
                       $response['message']="create_account_success";
                       echo json_encode($response);
                   }
                 }
        }
    }

?>