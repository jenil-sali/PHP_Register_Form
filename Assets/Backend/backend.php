<?php
include "config.php";



error_reporting(E_ALL);
ini_set("display_errors",1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"];
    $userName = $_POST["userName"];
    $password = base64_encode($_POST["password"]);
    $email = $_POST["email"];   
    $passwordConfirm = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $mobileNo = $_POST["mobile"];
    $date = date("Y-m-d H:i:s");

    $sql  = "INSERT INTO user_data (first_name, last_name, email, mobile, password, gender, date) VALUES ('$name', '$userName', '$email', '$mobileNo', '$password', '$gender', '$date')";

    // echo "<pre>";
    // print_r($sql);
    // die();
    if($conn->query($sql)===TRUE){
        echo '<script>alert("Data inserted Successfully !");
        location.href="../../index.php";</script>';
    }else{
        echo '<script>alert("Something went Wrong! Please try again");
        location.href="../../index.php"</script>';
    }
}
