<?php

include "server.php";

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $sql = "SELECT token FROM users WHERE token='$token'";
    $res = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($res);

    if($token==$data['token']){
        $query = "UPDATE users SET verified=1 WHERE token='$token'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "Email Verified successfully";
        }
    }else{
        $msg = "Invalid Token Entered";
        header("Location: verify_token.php?message=$msg");

    }
}




?>