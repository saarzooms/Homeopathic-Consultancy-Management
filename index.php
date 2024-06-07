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
    </style>
</head>

<body style="background-color: #0b6e4f">
    <nav class="navbar shadow navbar-expand-lg fixed-top">
        <!-- Navbar content -->
    </nav>
    <br><br><br><br><br>

    <div class="container justify-content-center d-flex  ">
        <div class=" mx-3 rounded-5" style="background-color: #d1d3ab; width: 60%;">

            <div class="input-group m-0 rounded-5 ">
    
                <div class="btn-group p-1 bg-white row rounded-3 ms-0 " role="group"
                    aria-label="Basic checkbox toggle button group" style="width: 100%;">
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check " id="btncheck1" autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck1">Case No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check " id="btncheck2" autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck2">File No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check " id="btncheck3" autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck3">Mobile No.</label>
                    </div>
                    <div class="col-md-3 d-flex align-items-center">
                        <input type="checkbox" class="btn-check " id="btncheck4" autocomplete="off">
                        <label class="btn rounded-3 btn-checker w-100" for="btncheck4">Name</label>
                    </div>
    
                </div>
    
    
            </div>
        </div>
    </div>


    <div class="mt-3 bg-white mx-3 rounded-3 text-align-center p-3 fs-6">
        <div class="table-responsive">
            <table id="table" class="table table-striped p-3">
                <thead>
                    <tr>
                        <th scope="col">Case No.</th>
                        <!-- <th scope="col">File No.</th> -->
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Last Visited</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM test_details";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["caseno"]; ?></td>
                                <!-- <td><?php echo $row["file"]; ?></td>s -->
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["mobile"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td>
                                    <div class="btn-container">
                                        <!-- Add your action buttons here -->

                                        <a id="tooltip" class="btn rounded-4 mb-1 mt-1 w-100 edit-button action-button" href="edit.php?caseno=<?php echo $row["caseno"]; ?>" style="background-color: #d1d3ab;">
                                        <span id="tooltiptext">Edit Patient Details</span>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
    



                                        <a id="tooltip" class="btn rounded-4 mb-1 mt-1 w-100 add-button action-button"
                                            href="checkup-page.php?caseno=<?php echo $row["caseno"]; ?>" style="background-color: #0b6e4f; color: white;"> <span
                                                id="tooltiptext">Patient Checkup</span><i
                                                class="fa-solid fa-notes-medical"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">No data found</td>
                        </tr>
                    <?php
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
