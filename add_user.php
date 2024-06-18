<?php
// Include the database configuration file
include 'config.php';

// Handle form submission for adding a new user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $role = ucfirst($_POST['role']);
    $mobile = $_POST['mobile'];

    $insertSql = "INSERT INTO admin (name, role, mobile,password) VALUES ('$name', '$role', '$mobile','$mobile')";
    if ($conn->query($insertSql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

// Handle form submission for editing an existing user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = ucfirst($_POST['role']);
    $mobile = $_POST['mobile'];

    $updateSql = "UPDATE admin SET name='$name', role='$role', mobile='$mobile' WHERE id=$id";
    if ($conn->query($updateSql) === TRUE) {
        // echo "Record updated successfully";
    } else {
        echo "Error: " . $updateSql . "<br>" . $conn->error;
    }
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $deleteSql = "DELETE FROM admin WHERE id=$id";
    if ($conn->query($deleteSql) === TRUE) {
        // echo "Record deleted successfully";
    } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
    }
}

// Fetch data from the "admin" table
$sql = "SELECT id, name, role, mobile FROM admin";
$result = $conn->query($sql);
?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body style="background-color: #0b6e4f;">
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-house-chimney-medical mt-3"></i>
                    <div class="sidebar-logo">
                        <a href="">Ideal Homeo Clinic</a>
                    </div>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item mb-1 ">
                    <a href="admin_profile.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span class="ms-2">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="add_user.php" class="sidebar-link">
                        <i class="fa-solid fa-user-plus"></i>
                        <span >Add User</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="#" class="sidebar-link ">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white " style="margin-left: -3px;"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                          </svg>
                        <span style="margin-left: 12px;">Role Management</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="lab_test.php" class="sidebar-link">
                        <i class="fa-solid fa-microscope"></i>
                        <span class="ms-1">Lab Tests</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="admin.php " class="sidebar-link">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">Back</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="login.php" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="align-items-center mb-1 bg-white h-100 w-100 p-4 rounded-3" style="margin: 20px; display: block;">
            <form id="userForm" method="POST">
                <div class="row" style="padding: 0px;">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input placeholder="Name" type="text" class="form-control" id="recipient-name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Role select" name="role" required>
                                <option selected disabled>Choose Role</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Admin">Admin</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="number" placeholder="Mobile Number" class="form-control" id="mobile" name="mobile" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="userId">
                <button type="submit" name="add_user" class="rounded-3 p-3 border-0 w-100" style="background-color: #1da453e1; color: white; font-weight: 500;">SAVE <i class="fa-solid fa-check"></i></button>
            </form>

            <div class="table-responsive mt-3">
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
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . ucfirst($row["role"]) . "</td>";
                                echo "<td>" . $row["mobile"] . "</td>";
                                echo '<td>
                                    <div class="btn-container">
                                        <button class="btn btn-primary rounded-4 mb-1 mt-1 edit-button action-button" data-id="'.$row["id"].'" data-name="'.$row["name"].'" data-role="'.$row["role"].'" data-mobile="'.$row["mobile"].'"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <a class="btn rounded-4 mb-1 mt-1 btn btn-danger add-button action-button" href="?delete_id='.$row["id"].'"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    const button = document.querySelector(".toggle-btn");
    button.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    // Handle edit button click
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const role = this.getAttribute('data-role');
            const mobile = this.getAttribute('data-mobile');

            document.getElementById('recipient-name').value = name;
            document.querySelector('select[name="role"]').value = role;
            document.getElementById('mobile').value = mobile;
            document.getElementById('userId').value = id;

            document.querySelector('button[name="add_user"]').name = "edit_user";
        });
    });
</script>
</body>
</php>
