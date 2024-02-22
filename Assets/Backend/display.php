<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Assets/CSS/style.css" />

</head>

<body>
    <div class="container">
        <?php
        // Start the session
        session_start();

        // Check if there are users stored in the session
        if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
            echo "<h2>Registered Users</h2>";
            echo "<table border='1'>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th></tr>";

            // Loop through each user and display their information
            foreach ($_SESSION['users'] as $user) {
                echo "<tr>";
                echo "<td>" . $user['Name'] . "</td>";
                echo "<td>" . $user['User Name'] . "</td>";
                echo "<td>" . $user['Email'] . "</td>";
                echo "<td>" . $user['Gender'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No users registered yet.</p>";
        }

        echo '<a href="index.html">Back to Registration</a><br>';
        echo '<a href="index.html" onclick="<?php session_destroy(); ?">Destroy Session</a>';
        ?>
    </div>
</body>

</html>