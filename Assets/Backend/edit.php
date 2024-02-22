<?php
session_start();

$userId = base64_decode($_GET["id"]);

include("config.php");

$sql = "SELECT * FROM user_data where `uid` = '".$userId."'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();
// if ($result->num_rows > 0) {
// }


// die($result);

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Registration | Jenil @ Agami</title>
    <link rel="stylesheet" href="../CSS/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
    <div class="container">
        <div class="title">Update Data</div>
        <div class="content">
            <form action="updateuser.php" method="post" id="registerform" name="registerform">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name *</span>
                        <input type="text" placeholder="Enter your name" name="name" id="name" autocomplete="off" value="<?php echo htmlspecialchars($row['first_name'])?>" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name *</span>
                        <input type="text" placeholder="Enter your username" name="userName" id="userName" value="<?php echo htmlspecialchars($row['last_name']) ?>" autocomplete="off"  required />
                    </div>
                    <div class="input-box">
                        <span class="details">Email *</span>
                        <input type="email" placeholder="Enter your email" name="email" id="email" autocomplete="off" value="<?php echo htmlspecialchars($row['email']); ?>" <?php echo($row['email']) ? "readonly" : ""; ?> />
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number *</span>
                        <input type="text" placeholder="Enter your number" name="mobile" id="mobile" autocomplete="off" value="<?php echo htmlspecialchars($row['mobile'])?>" required />
                    </div>

                </div>
                <div class="gender-details">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <!-- <span class="dot one"></span> -->
                            <input type="radio" name="gender" id="dot-1" value="male" <?php if($row['gender'] == "male") echo "checked"; ?>/>
                            <span class="gender">Male</span>
                        </label>
                       
                    </div>
                    <div  class="category">
                    <label for="dot-2">
                            <!-- <span class="dot two"></span> -->
                            <input type="radio" name="gender" id="dot-2" value="female" <?php if($row['gender'] == "female") echo "checked"; ?>/>
                            <span class="gender">Female</span>
                        </label>
                        
                    </div>
                </div>
                <div class="button">
                    <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>" />
                    <input type="submit" name="Update" value="Update" id="Register" />
                </div>
                <div class="button">
                    <input type="reset" value="Reset" id="reset" />
                </div>

            </form>
        </div>

    </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#registerform").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    userName: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    gender: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    userName: {
                        required: "Please enter your username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your phone number",
                        minlength: "Your phone number must consist of at least 10 characters",
                        maxlength: "Your phone number must not exceed 12 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    confirmPassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    gender: {
                        required: "Please select your gender"
                    }
                },
            });
        });

        // $("#edit").click(){
        //     $("#Register").val("Update")
        // }
    </script>



</body>

</html>

