<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the mobile number and password from the POST request
    $mobileNo = $_POST['mobileno'];
    $passwordinput = $_POST['pass'];

    // Echo the values
    echo "Mobile Number: " . htmlspecialchars($mobileNo) . "<br>";
    echo "Password: " . htmlspecialchars($passwordinput) . "<br>";
}

// Include your database configuration file
include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch the password
$stmt = $conn->prepare("SELECT password FROM admin WHERE mobile = ?");
$stmt->bind_param("s", $mobileNo);
$stmt->execute();
$stmt->bind_result($password);

// Fetch the result and check the password
if ($stmt->fetch()) {
    if ($password == $passwordinput) {
        echo "Password matches input.<br>";
        $stmt->close();

        // Prepare and execute the SQL query to fetch the role and id
        $stmtRoleId = $conn->prepare("SELECT role, id FROM admin WHERE mobile = ?");
        $stmtRoleId->bind_param("s", $mobileNo);
        $stmtRoleId->execute();
        $stmtRoleId->bind_result($role, $id);

        if ($stmtRoleId->fetch()) {
            echo "Role: " . htmlspecialchars($role) . "<br>";
            echo "ID: " . htmlspecialchars($id) . "<br>";

            // Close the statement
            $stmtRoleId->close();

            // Redirect based on the role
            switch($role) {
                case "Doctor":
                    echo "Doctor";
                    header("Location: index.php?id=".$id);
                    exit();

                case "Receptionist":
                    echo "Receptionist";
                    // Uncomment the line below when you have the correct URL
                    // header("Location: receptionist.php?id=".$id);
                    exit();

                case "Admin":
                    echo "Admin";
                    // Uncomment the line below when you have the correct URL
                    header("Location: admin.php?id=".$id);
                    exit();

                case "Other":
                    echo "Other";
                    // Uncomment the line below when you have the correct URL
                    // header("Location: other.php?id=".$id);
                    exit();

                default:
                    echo "No case found";
                    exit();
            }
        } else {
            echo "No role or ID found.<br>";
        }
    } else {
        echo "Password does not match input.<br>";
    }
} else {
    echo "No record found.<br>";
}

// Close the database connection
$conn->close();
?>
