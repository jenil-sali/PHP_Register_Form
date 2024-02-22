<?php

include("config.php");

if ($_REQUEST['action'] == 'user_delete') {
    $uid = $_POST["uid"];
    $response = array();
    $sql = "DELETE FROM user_data WHERE uid = '$uid'";
    $result = $conn->query($sql);
    
    if ($result) {
        $response['status'] = 1;
        if ($conn->affected_rows > 0) {
            $response['message'] = 'User deleted successfully';
        } else {
            $response['message'] = 'No user found with provided ID';
        }
        echo json_encode($response);
    } else {
        $response['status'] = 0;
        $response['message'] = 'Someting Went Wrong..!';
        echo json_encode($response);
    }
} 




$conn->close();

?>

