<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
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
                <li class="sidebar-item mb-1">
                    <a href="admin_profile.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span class="ms-2">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="add_user.php" class="sidebar-link">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Add User</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="#" class="sidebar-link">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white " style="margin-left: -3px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                    <a href="index.php " class="sidebar-link">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="ms-1">Back</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div id="container" class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="border-0 w-100 rounded-5 p-4 shadow box-area" style="background-color: #d1d3ab;">
                <form id="test-form">
                    <div class="mb-3 mt-2">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div id="labtest">
                                <h3><b>Lab Tests:</b></h3>
                            </div>
                            <div class="col-md-8 mt-2" style="padding: auto;">
                                <input type="text" class="form-control h-100" id="lab-test-name">
                            </div>
                            <div class="col-md-4 mt-2" style="padding: auto;">
                                <button class="form-control p-3 border-0 rounded-3 w-100" id="add-test-btn" style="display: inline; background-color:#1da453; max-width: 100%; color: bisque;">ADD <i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="table-responsive border-0 rounded-3 mt-2" style="max-height: 50vh;">
                                <table id="table" class="table table-striped p-3 rounded-3">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0" scope="col">Sr No.</th>
                                            <th class="border-0" scope="col">Lab</th>
                                            <th class="border-0" scope="col">Added by:</th>
                                            <th class="border-0" scope="col">Last Updated</th>
                                            <th class="border-0" scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="test-list" class="border-0">
                                        <?php
                                            // Database connection
                                            $conn = new mysqli("localhost", "root", "", "pdo");

                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM test_name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    $btnClass = $row["is_disabled"] ? "btn-success" : "btn-danger";
                                                    $btnText = $row["is_disabled"] ? "Enable" : "Disable";
                                                    echo "<tr class='border-0 rounded-3'>
                                                            <td class='border-0'>{$row['id']}</td>
                                                            <td class='border-0'>{$row['lab']}</td>
                                                            <td class='border-0'>121</td>
                                                            <td class='border-0'>{$row['date']}</td>
                                                            <td class='border-0' style='width: 30%;'>
                                                                <div class='btn-container'>
                                                                    <button class='btn $btnClass rounded-4 mb-1 mt-1 w-100 toggle-button action-button' data-id='{$row['id']}'>$btnText</button>
                                                                </div>
                                                            </td>
                                                          </tr>";
                                                }
                                            }
                                            $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const testForm = document.getElementById('test-form');
                const testList = document.getElementById('test-list');
                const addTestBtn = document.getElementById('add-test-btn');
                const labTestName = document.getElementById('lab-test-name');

                // AJAX for enabling/disabling test
                testList.addEventListener('click', function(event) {
                    if (event.target.classList.contains('toggle-button')) {
                        event.preventDefault();
                        const button = event.target;
                        const testId = button.getAttribute('data-id');
                        const action = button.textContent.trim() === 'Disable' ? 'disable' : 'enable';

                        fetch('toggle_test.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${testId}&action=${action}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                button.textContent = data.newStatus;
                                button.classList.toggle('btn-danger', data.newStatus === 'Disable');
                                button.classList.toggle('btn-success', data.newStatus === 'Enable');
                            } else {
                                alert('Failed to update status');
                            }
                        });
                    }
                });

                // AJAX for adding a new test
                addTestBtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    const labName = labTestName.value.trim();

                    if (labName === '') {
                        alert('Lab test name is required');
                        return;
                    }

                    fetch('add_test.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `lab=${labName}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const newRow = document.createElement('tr');
                            newRow.classList.add('border-0', 'rounded-3');
                            newRow.innerHTML = `
                                <td class='border-0'>${data.id}</td>
                                <td class='border-0'>${labName}</td>
                                <td class='border-0'>121</td>
                                <td class='border-0'>${data.date}</td>
                                <td class='border-0' style='width: 30%;'>
                                    <div class='btn-container'>
                                        <button class='btn btn-danger rounded-4 mb-1 mt-1 w-100 toggle-button action-button' data-id='${data.id}'>Disable</button>
                                    </div>
                                </td>
                            `;
                            testList.appendChild(newRow);
                            labTestName.value = '';
                        } else {
                            alert('Failed to add test some changes');
                        }
                        
                    });
                });
            });
        </script>
    </div>
</body>
</html>
