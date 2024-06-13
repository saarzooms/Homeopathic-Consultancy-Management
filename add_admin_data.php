<?php
// Include the database configuration file
include 'config.php';

// SQL to create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    mobile INT(11) NOT NULL
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'admin' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert fake data
$fakeData = [
    ['Umang Hirani', 'Doctor', 7984940336],
    ['Aryan Mahida', 'Doctor', 9030620245],
    ['Rishit Rathod', 'Doctor', 9590284822],
    ['Kirtan Makwana', 'Doctor', 9437292302]
];

// Check if table is empty before inserting fake data
$checkDataSql = "SELECT COUNT(*) as count FROM admin";
$result = $conn->query($checkDataSql);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    foreach ($fakeData as $data) {
        $name = $data[0];
        $role = $data[1];
        $mobile = $data[2];
        
        $insertSql = "INSERT INTO admin (name, role, mobile) VALUES ('$name', '$role', '$mobile')";
        
        if ($conn->query($insertSql) === TRUE) {
            echo "New record created successfully: $name<br>";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error . "<br>";
        }
    }
}

// Fetch data from the "admin" table
$sql = "SELECT id, name, role, mobile FROM admin";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Table</title>
</head>
<body>
    <div class="bg-white mx-3 rounded-3 text-align-center p-3 fs-6 mt-3">
        <div class="table-responsive">
            <table id="table" class="table table-striped p-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['role']}</td>
                                    <td>{$row['mobile']}</td>
                                    <td>
                                        <div class=\"btn-container\">
                                            <button id=\"tooltip\" class=\"btn rounded-4 mb-1 mt-1 edit-button action-button\" style=\"background-color: #d1d3ab;\">
                                                <span id=\"tooltiptext\">Edit</span>
                                                <i class=\"fa-solid fa-pen-to-square ms-2\"></i>
                                            </button>
                                            <a id=\"tooltip\" class=\"btn rounded-4 mb-1 mt-1 add-button action-button\" href=\"delete.php?id={$row['id']}\" style=\"background-color: #0b6e4f; color: white;\">
                                                <span id=\"tooltiptext\">Delete</span>
                                                <i class=\"fa-solid fa-trash ms-2\"></i>
                                            </a>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
