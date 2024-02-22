
<?php
include("config.php");
if ($_REQUEST['action'] == 'status_change') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($id != null || $id != '') {
        $sql1 = "UPDATE `user_data` SET `status`='$status' where `uid`='$id';";
        $result = mysqli_query($conn, $sql1);

        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

if($_REQUEST['action'] == 'user_delete') {
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

if ($_REQUEST['action'] == 'clear_data') {
    $status = $_POST['status'];
    if ($status) {
        $sql1 = "DELETE FROM `user_data` ; ";
        if ($conn->query($sql1) === TRUE) {
            echo 1;
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

?>