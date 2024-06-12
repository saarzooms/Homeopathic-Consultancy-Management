<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeopathic Consultancy Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="table-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-checker:hover {
            background-color: bisque !important;
            color: #073426 !important;
            transition: all 0.5s ease;
        }

        .btn-checker:checked {
            background-color: bisque !important;
        }

        .btn-checker {
            margin: 5px;
        }

        .table-container {
            max-height: 65vh;
            overflow-y: scroll;
        }
    </style>
</head>

<body style="background-color: #0b6e4f">
<nav class="navbar shadow navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto " id="spmsbranding" href="index.html">IDEAL</a>
            <div class="d-flex align-items-center justify-content-center w-50 position-relative searchbar ">
                <input id="searchbar-input" type="text" class="searchbar w-100" placeholder="Search" aria-label="Search" value="<?php 
                
                if(isset($_GET['search'])) {
                    $search_result = $_GET['search'];
                } else {
                    $search_result = "";
                }
                
                echo htmlspecialchars($search_result);
                ?>">

                <button class="btn rounded-5 " id="searchbutton">
                    <i style="color: white;" class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            
            <a href="details.php" id="tooltip" class="btn rounded-5 ms-auto position-relative fs-4">
                <span id="tooltiptext">Enter Patient Details</span>
                <img class="nav-buttons" src="Images And Icons/add_patient.png"
                    style="height: 25px; opacity: 85%; transform: translateY(-7%);" alt="">
            </a>

            <div class="btn-group border-0 rounded-5">
                <button type="button" id="tooltip" class="btn rounded-5 " data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span id="tooltiptext">Account</span>
                    <img class="nav-buttons" src="Images And Icons/user-doctor-solid.svg"
                        style="height: 25px; opacity: 85%; transform: translateY(-9%);" alt="">
                </button>
                <ul class="dropdown-menu border-0 p-2" style="transform: translateX(-75%);">
                    <li><a class="dropdown-item p-2 rounded-3 btn mb-1 profile-setting-button justify-content-center d-flex"
                            href="profile.html">
                            <div class="me-auto w-100" style="display: inline;"><i class="fa-solid fa-user-doctor"></i>
                            </div><span class="w-100" style="text-align: right;">Profile</span>
                        </a></li>
                        <li><a class="dropdown-item p-2 rounded-3 btn mt-2 profile-setting-button justify-content-center d-flex "
                            href="settings.php">
                            <div class="me-auto w-100 " style="display: inline;"> <i style="font-size: 13px;"
                                    class="fa-solid fa-gear"></i> </div><span class="w-100"
                                style="text-align: right;">Settings</span>
                        </a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="login.html"
                            class="dropdown-item p-3 rounded-3 btn btn-danger logout-button justify-content-center d-flex"
                            style="background-color: rgba(255, 0, 0, 0.115);" href="#">
                            <div class="me-auto w-100" style="display: inline;"><i style="font-size: 13px; color: red;"
                                    class="fa-solid fa-right-from-bracket"></i> </div><span class="w-100"
                                style="text-align: right; color: red;">Logout</span>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>

    <?php
    if(isset($_GET['search'])) {
        $search_result = $_GET['search'];
    } else {
        $search_result = "";
    }

    $btn_1 = $btn_2 = $btn_3 = $btn_4 = "";

    if(isset($_GET['btncheck1']) || isset($_GET['btncheck2']) || isset($_GET['btncheck3']) || isset($_GET['btncheck4'])) {
        if(isset($_GET['btncheck1'])) {
            $btn_1 = "checked";
        }
        if(isset($_GET['btncheck2'])) {
            $btn_2 = "checked";
        }
        if(isset($_GET['btncheck3'])) {
            $btn_3 = "checked";
        }
        if(isset($_GET['btncheck4'])) {
            $btn_4 = "checked";
        }
    } else {
        $btn_1 = "checked";
    }
    ?>

    <div class="container justify-content-center d-flex">
        <div class="mx-3 rounded-5" style="background-color: #d1d3ab; width: 60%;">
            <div class="input-group m-0 rounded-5">
                <div class="btn-group p-1 bg-white row rounded-3 ms-0" role="group" aria-label="Basic checkbox toggle button group" style="width: 100%;">
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check" id="btncheck1" <?php echo $btn_1; ?> autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck1">Case No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check" id="btncheck2" <?php echo $btn_2; ?> autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck2">File No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check" id="btncheck3" <?php echo $btn_3; ?> autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck3">Mobile No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check" id="btncheck4" <?php echo $btn_4; ?> autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck4">Name</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("searchbutton").addEventListener("click", function () {
            var searchresult = document.getElementById("searchbar-input").value;
            var selectedOptions = [];
            var checkboxes = document.querySelectorAll('.btn-check');
        
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    selectedOptions.push(checkbox.id);
                }
            });

            var queryString = "";
            if (searchresult.trim() !== "") {
                queryString += "search=" + encodeURIComponent(searchresult);
            }
            
            if (selectedOptions.length > 0) {
                var optionsString = selectedOptions.join('&');
                if (queryString !== "") {
                    queryString += "&";
                }
                queryString += optionsString;
            }

            location.href = "index.php?" + queryString;
        });
    });
    </script>

    <div class="mt-3 bg-white mx-3 rounded-3 text-align-center p-3 fs-6 table-container">
        <div class="table-responsive" style="max-height: 65vh;overflow-y:scroll;overflow-x:scroll;">
            <table id="table" class="table table-striped p-3">
                <thead>
                    <tr>
                        <th scope="col">Case No.</th>
                        <th scope="col">File No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Last Visited</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'config.php';

                $search_term = isset($_GET['search']) ? $_GET['search'] : '';
                $conditions = [];

                if (isset($_GET['btncheck1'])) {
                    $conditions[] = "caseno LIKE '%" . $conn->real_escape_string($search_term) . "%'";
                }

                if (isset($_GET['btncheck2'])) {
                    $conditions[] = "fileno LIKE '%" . $conn->real_escape_string($search_term) . "%'";
                }

                if (isset($_GET['btncheck3'])) {
                    $conditions[] = "mobile LIKE '%" . $conn->real_escape_string($search_term) . "%'";
                }

                if (isset($_GET['btncheck4'])) {
                    $conditions[] = "name LIKE '%" . $conn->real_escape_string($search_term) . "%'";
                }

                $sql = "SELECT * FROM test_details";
                if (!empty($conditions)) {
                    $sql .= " WHERE " . implode(" OR ", $conditions);
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['caseno']}</td>
                                <td>{$row['fileno']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['mobile']}</td>
                                <td>{$row['date']}</td>
                                <td>
                                    <div class='btn-container'>
                                        <a id='tooltip' class='btn rounded-4 mb-1 mt-1 w-100 edit-button action-button' href='edit.php?caseno={$row['caseno']}' style='background-color: #d1d3ab;'>
                                            <span id='tooltiptext'>Edit Patient Details</span>
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </a>
                                        <a id='tooltip' class='btn rounded-4 mb-1 mt-1 w-100 add-button action-button' href='checkup-page.php?caseno={$row['caseno']}' style='background-color: #0b6e4f; color: white;'>
                                            <span id='tooltiptext'>Patient Checkup</span>
                                            <i class='fa-solid fa-notes-medical'></i>
                                        </a>
                                    </div>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
