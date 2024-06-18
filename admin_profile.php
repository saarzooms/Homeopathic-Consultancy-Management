<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #0b6e4f">

    <style>
        a{
            text-decoration: none;
        }
    </style>
    
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-house-chimney-medical mt-3"></i>
                    <div class="sidebar-logo">
                        <a style="color: white !important;" href="">Ideal Homeo Clinic</a>
                    </div>
               </button>
                
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item mb-1 ">
                    <a href="admin.php" class="sidebar-link">
                        <!-- <i class="lni lni-user"></i> -->
                        <i class="fa-solid fa-user"></i>
                        <span class="ms-2">Profile</span>
                    </a>
                    
                </li>
                
                <li class="sidebar-item mb-1">
                    <a href="add_user.php" class="sidebar-link">
                        <!-- <i class="lni lni-agenda"></i> -->
                        <i class="fa-solid fa-user-plus"></i>
                        <span >Add User</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="#" class="sidebar-link ">
                        <!-- <i class="lni lni-protection"></i> -->
                        <!-- <i class="fa-solid fa-people-roof"></i> -->
                        <!-- <i class="lni lni-agenda"></i> -->
                        <svg class="w-6 h-6 text-gray-800 dark:text-white " style="margin-left: -3px;"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                          </svg>
                          
                        <span style="margin-left: 12px;">Role Management</span>
                    </a>
                    <!-- <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item mb-1">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item mb-1">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul> -->
                </li>
               
                <li class="sidebar-item mb-1">
                    <a href="lab_test.php" class="sidebar-link">
                        <!-- <i class="lni lni-popup"></i> -->
                        <!-- <i class="fa-solid fa-flask-vial"></i> -->
                        <i class="fa-solid fa-microscope"></i>
                        <span class="ms-1">Lab Tests</span>
                    </a>
                </li>
                <li class="sidebar-item mb-1">
                    <a href="admin.php " class="sidebar-link">
                        <!-- <i class="lni lni-cog"></i> -->
                        <!-- <i class="fa-solid fa-gear"></i> -->
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-1">Home</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <!-- <i class="lni lni-exit"></i> -->
                    <i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
    <div id="container" class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-3 p-4 bg-white ">

        Name - John Doe<br>
        ID - an225 <br>
        Password - xyz12345 <br>
            </div>
        </div>




<script>
    const button = document.querySelector(".toggle-btn");

button.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
</script>

    

</body>
</php>