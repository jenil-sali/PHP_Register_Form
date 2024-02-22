<?php
session_start();

include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $uid = $_POST['uid'];
    $name = $_POST["name"];
    $userName = $_POST["userName"];
    // $password = $_POST["password"];
    $email = $_POST["email"];
    // $passwordConfirm = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $mobileNo = $_POST["mobile"];
   
    $sql  = "UPDATE `user_data` SET `first_name`='$name',`last_name`='$userName',`email`='$email',`mobile`='$mobileNo',`gender`='$gender' WHERE `uid`='$uid'";

    // echo "<pre>";
    // print_r($sql);
    // echo "</pre>";
    // die();
    if($conn->query($sql)===TRUE){
        echo '<script>alert("Data Updated Successfully !");
        location.href="../../index.php";</script>';
    }else{
        echo '<script>alert("Something went Wrong! Please try again");
        location.href="../../index.php"</script>';
    }
}  


