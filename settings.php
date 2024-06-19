<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="details.css">
    <link rel="stylesheet" href="table-styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        input:focus {
            outline: none;
            box-shadow: none;
            border: none;
        }

        .right-align {
            text-align: right;
        }

        .input-group-text-right {
            display: flex;
            justify-content: space-between;
            width: 100%;
            background-color: #0b6e4f;
            color: bisque;
        }

        .input-group-text-right span {
            flex-grow: 1;
        }

        .input-group-text-right b {
            margin-left: auto;
        }

        .input-group-append {
            cursor: pointer;
        }
    </style>
</head>
<body style="background-color: #0b6e4f;">

    <div class="container d-flex justify-content-center">
        <div class="bg-white mx-5 w-50 rounded-3 text-align-center mt-5 p-3 fs-6" style="min-width: 100%;">

        <?php
        include "config.php";

        $current_file_number = '';
        $current_password = '';

        if (isset($_GET['id'])) {
            $doctorid = $_GET['id'];

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch current fileno and password
            $stmt = $conn->prepare("SELECT fileno, password FROM admin WHERE id = ?");
            $stmt->bind_param("i", $doctorid);

            if ($stmt->execute()) {
                $stmt->bind_result($current_file_number, $current_password);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo '<div class="alert alert-danger">Error fetching current data: ' . $conn->error . '</div>';
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $new_file_number = $_POST['file_number'];
                $new_password = $_POST['password'];

                // Securely update the file number and password
                $stmt = $conn->prepare("UPDATE admin SET fileno = ?, password = ? WHERE id = ?");
                $stmt->bind_param("ssi", $new_file_number, $new_password, $doctorid);

                if ($stmt->execute()) {
                    // echo '<div class="alert alert-success">File number and password updated successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger">Error updating data: ' . $conn->error . '</div>';
                }

                $stmt->close();
                $conn->close();
                header("Refresh:0");
            }
        }
        ?>

            <form method="POST" action="">
                <div class="input-group mb-3">
                    <span class="input-group-text p-3" style="background-color: #0b6e4f; color: bisque;">File No.</span>
                    <input type="number" name="file_number" class="form-control right-align" aria-label="File Number" style="background-color: #d1d3ab;" placeholder="Enter File Number" value="<?php echo htmlspecialchars($current_file_number); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text p-3" style="background-color: #0b6e4f; color: bisque;">Password</span>
                    <input type="password" name="password" id="password" class="form-control right-align" aria-label="Password" style="background-color: #d1d3ab;" placeholder="Enter Password" value="<?php echo htmlspecialchars($current_password); ?>">
                    <div class="input-group-append">
                        <button type="button" class="btn rounded-0 h-100 bg-light" style="border-radius:0px 10px 10px 0px !important;" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></button>
                    </div>
                </div>
                <button type="submit" class="rounded-3 p-3 border-0 w-100" style="background-color: #1da453; color: white; font-weight: 500;">SAVE <i class="fa-solid fa-check"></i></button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                document.querySelector('.input-group-append button').innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            } else {
                passwordField.type = "password";
                document.querySelector('.input-group-append button').innerHTML = '<i class="fa-solid fa-eye"></i>';
            }
        }
    </script>
</body>
</html>
