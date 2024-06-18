<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Responsive Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="front-end/login-page-files/login-page-style.css">
</head>
<body style="background-image: radial-gradient(circle farthest-side,#125720 45%,#263a2a 100%);">
    <div id="container" class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="border-0 rounded-4 p-4 bg-white">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-image left-box d-flex justify-content-center align-items-center">
                        <img src="doctor_login.png" class="img-fluid w-100 rounded-4 d-flex justify-content-center align-items-center">
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <h1 id="welcome-back" class="p-1" style="margin-bottom: 25px;">Welcome Back</h1>
                    <div id="doctor" class="row align-items-center">
                        <form id="loginForm" action="login_validate.php" method="POST">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Enter Mobile Number" required>
                                <label class="floating-labels" for="mobileno" style="margin-left: 10px;">Mobile Number</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                                <label class="floating-labels" for="pass" style="margin-left: 10px;">Password</label>
                            </div>
                            <button type="submit" style="border: none; border-radius: 10px; background-color:#263a2a; color:white; width:100%" class="mt-3 p-3 submit-button-login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
