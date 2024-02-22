<?php
include("./Assets/Backend/config.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Registration | Jenil @ Agami</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./Assets/CSS/style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  </link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="info_text"></div>
    <div class="content">
      <form action="Assets/Backend/backend.php" method="post" id="registerform" name="registerform">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name *</span>
            <input type="text" placeholder="Enter your name" name="name" id="name" autocomplete="off" required />
          </div>
          <div class="input-box">
            <span class="details">Last Name *</span>
            <input type="text" placeholder="Enter your username" name="userName" id="userName" autocomplete="off" required />
          </div>
          <div class="input-box">
            <span class="details">Email *</span>
            <input type="text" placeholder="Enter your email" name="email" id="email" autocomplete="off" required />
          </div>
          <div class="input-box">
            <span class="details">Phone Number *</span>
            <input type="text" placeholder="Enter your number" name="mobile" id="mobile" autocomplete="off" required />
          </div>
          <div class="input-box">
            <span class="details">Password *</span>
            <input type="text" placeholder="Enter your password" name="password" id="password" autocomplete="off" required />
          </div>
          <div class="input-box">
            <span class="details">Confirm Password *</span>

            <input type="text" placeholder="Confirm your password" name="confirmPassword" id="confirmPassword" autocomplete="off" required />
          </div>
        </div>
        <div class="gender-details">


          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <input type="radio" name="gender" id="dot-1" value="male" />
              <span class="gender">Male</span>
            </label>
          </div>
          <div class="category">
            <label for="dot-2">
              <input type="radio" name="gender" id="dot-2" value="female" />
              <span class="gender">Female</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" id="Register" />
        </div>
        <div class="button">
          <input type="reset" value="Reset" id="reset" />
        </div>

      </form>
    </div>
    <div class="container">
      <?php
      // Start the session
      session_start();
      $sql = "SELECT * FROM `user_data`";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        echo "<h2>Registered Users</h2>";

      ?>
        <button class="clear-data" style="  background: linear-gradient(135deg, #71b7e6, #9b59b6);
  border: none;
  color:white;
  padding: 5px 15px;
  font-size: 20px;
  border-radius:5px ;"> Clear All</button>
        <?php
        echo "<table class='customers'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Gender</th>
    <th>Status</th>
    <th>Date</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["first_name"] . "</td>";
          echo "<td>" . $row["last_name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["mobile"] . "</td>";
          echo "<td>" . $row["gender"] . "</td>";

        ?>
          <td>
            <label class='switch'>";
              <?php if ($row['status'] == 1) { ?>

                <input class="user_switch" data-id="<?php echo $row['uid']; ?>" value="1" type="checkbox" checked>
              <?php } else { ?>
                <input class="user_switch" data-id="<?php echo $row['uid']; ?>" value="0" type="checkbox">

              <?php } ?>
              <span class="slider"></span>
            </label>


          </td>

      <?php
          echo "<td>" . $row["date"] . "</td>";
          echo "<td>"  . '<a href="./Assets/Backend/edit.php?id=' . base64_encode($row['uid']) . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . "</td>";
          echo "<td>"  . '<a href="" id="deletebtn" name="deletebtn" data-id=' . ($row["uid"]) . ' class="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></a>' . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "<p>No users registered yet.</p>";
      }
      ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <script>
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
  </script> -->
  <script>
    $(document).on("change", ".user_switch", function(e) {
      e.preventDefault();
      var status = $(this).val();
      var id = $(this).data('id');
      console.log(id);
      if (status == 1) {
        status = 0;
      } else {
        status = 1;
      }
      $.ajax({
        url: "./Assets/Backend/user.php",
        type: "POST",
        data: {
          status: status,
          id: id,
          action: "status_change",
        },
        dataType: 'JSON',
        success: function(data) {
          if (data == 1) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "User Active Status Updated Successfully",
              showConfirmButton: false,
              timer: 1500
            });
          }
        }
      });
    });


    $(document).on('click', '.deletebtn', function(e) {
      e.preventDefault();
      var uid = $(this).data('id') ;
      confirmStatus = confirm("Are you sure you want to delete?");
      console.log("DEV-CHECK-UID : ", uid);
      if (confirmStatus) { // Corrected typo in the confirm message
        $.ajax({
          url: './Assets/Backend/user.php',
          method: 'POST',
          data: {
            uid: uid,
            action: "user_delete"
          },
          dataType: 'JSON',
          success: function(response) {
            console.log("DEV-CHECK-RESPONSE : ", response);
            var status = response.status;

            if (status == 1) {
              // toastr.success(response.message);
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: response.message,
                showConfirmButton: false,
                timer: 1500
              });
              // location.reload();
            } else {
              // toastr.error(response.message);
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!"
                // footer: '<a href="#">Why do I have this issue?</a>'
              });
            }
          }
        });
      }
    });

    $(document).on("click", ".clear-data", function(e) {
      if (confirm("are you sure you want to remove everything")) {
        var status = 1;
        $.ajax({
          url: "./Assets/Backend/user.php",
          type: "POST",
          data: {
            action: "clear_data",
            status: status
          },
          dataType: 'JSON',
          success: function(data) {
            if (data == 1) {
              Swal.fire({
                icon: "success",
                position: "top-end",
                title: "All data has been deleted successfully",
                showConfirmButton: false,
                // timer: 3000
              });

              setTimeout(function() {
                window.location.reload();

              }, 2000);
            }
          }
        })
      }

    });
  </script>
</body>

</html>