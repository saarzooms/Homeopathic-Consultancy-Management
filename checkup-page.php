<?php
include 'config.php';

if (isset($_GET['caseno'])) {
    $caseno = $_GET['caseno']; 
    
    $sql = "SELECT * FROM test_details WHERE caseno = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $caseno);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No patient found with case number $caseno";
            exit;
        }
    } else {
        echo "Error preparing the statement.";
        exit;
    }

    $sql1 = "SELECT medicine,dose,date FROM prescriptions WHERE caseno = ?";
    $stmt1 = $conn->prepare($sql1);
    $row1 = [];
    if ($stmt1) {
        $stmt1->bind_param("i", $caseno);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if ($result1->num_rows > 0) {
            // $row1 = $result1->fetch_assoc();
            
        // Fetch each row and add to the array
        while ($row33 = $result1->fetch_assoc()) {
            $row1[] = $row33;
        }
        } else {
            echo "No patient found with case number $caseno";
            exit;
        }
    } else {
        echo "Error preparing the statement.";
        exit;
    }

    $sql2 = "SELECT * FROM checkup_remarks WHERE caseno = ?";
    $stmt2 = $conn->prepare($sql2);
    if ($stmt2) {
        $stmt2->bind_param("i", $caseno);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
        } else {
            echo "No patient found with case number $caseno";

            exit;
        }
    } else {
        echo "Error preparing the statement.";
        exit;
    }

    $visit_sql = "SELECT COUNT(*) as visit_count FROM checkup_remarks WHERE caseno = ?";
    $visit_stmt = $conn->prepare($visit_sql);
    if ($visit_stmt) {
        $visit_stmt->bind_param("i", $caseno);
        $visit_stmt->execute();
        $visit_result = $visit_stmt->get_result();
        $visit_data = $visit_result->fetch_assoc();
        $visit_count = $visit_data['visit_count'];
    } else {
        echo "Error counting visits.";
        exit;
    }


    if ($visit_count < 2) {
        $display_date = $row['date'];
    } else {
        
        $last_visit_sql = "SELECT date FROM checkup_remarks WHERE caseno = ? ORDER BY date DESC LIMIT 1";
        $last_visit_stmt = $conn->prepare($last_visit_sql);
        if ($last_visit_stmt) {
            $last_visit_stmt->bind_param("i", $caseno);
            $last_visit_stmt->execute();
            $last_visit_result = $last_visit_stmt->get_result();
            if ($last_visit_result->num_rows > 0) {
                $last_visit_row = $last_visit_result->fetch_assoc();
                $display_date = $last_visit_row['date'];
            } else {
                echo "No previous visits found.";
                exit;
            }
        } else {
            echo "Error fetching last visit date.";
            exit;
        }
    }
} else {
    echo "Case number not provided";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST['date'];
    $remarks = $_POST['remarks'];

    $query = "INSERT INTO checkup_remarks (caseno, date, remarks, file) 
              VALUES (?, ?, ?, '')";
    
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("iss", $caseno, $date, $remarks);

        if ($stmt->execute()) {
            echo "Data inserted successfully.";
            $medicine = $_POST['medicine'];
            $dose = $_POST['dose'];
            for ($i = 0; $i < count($medicine); $i++) {
                $medicines = htmlspecialchars($medicine[$i]);
                $doses = htmlspecialchars($dose[$i]);
                
                $med_query = "INSERT INTO prescriptions (caseno, medicine, dose, date) 
                              VALUES (?, ?, ?, ?)";
                $med_stmt = $conn->prepare($med_query);
                if ($med_stmt) {
                    $med_stmt->bind_param("isss", $caseno, $medicines, $doses, $date);
                    if ($med_stmt->execute()) {
                        // echo "Medicine and dose added successfully.";
                    } else {
                        echo "Error inserting medicine and dose.";
                    }
                } else {
                    echo "Error preparing the medicine statement.";
                }
            }
        } else {
            echo "Error inserting data.";
        }
    } else {
        echo "Error preparing the statement.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Checkup</title>
    <link rel="stylesheet" href="details.css">
</head>


<style>

    #view-info-button:hover{

        opacity: 90%;
        transition: all 0.3s ease-in-out;
        background-color: white !important;

    }
    #view-info-button{

        opacity: 100%;
        transition: all 0.3s ease-in-out;

    }

</style>

<body style="background-color: #0b6e4f">

    <div class="justify-content-center align-items-center mb-1 p-4 rounded-3">

        <div class="row w-100" style="margin-left: 0px;">
            <div class="col-md-6 left-box p-2" >
                <div class="justify-content-center align-items-center mb-1 p-3 rounded-3"
                    style="background-color: #d1d3ab;">
                    <div class="input-group">
                        <div class="row w-100" style="margin: auto;">
                            <div class="col-md-4" style="padding: 0px; padding-bottom: 0px;">
                                <div class="h-100 w-100 img-fluid img-div"
                                    style="padding-right: 15px; padding-bottom: 0px; max-height: min-content;">
                                    <img src="doctor_login.png" class="w-100 h-100 rounded-4"
                                        style="background-color: #d1d3ab;" alt="Images And Icons/user-solid.svg">
                                </div>
                            </div>
                            <div class="col-md-8" style="padding: 0px;">
                                <div class="p-3 border-0 rounded-3 w-100 mb-3" id="inputGroup-sizing-default"
                                    style="background-color: #0b6e4f;color: bisque; text-align: center; font-weight: 600; font-size: 20px;">
                                    <?php echo $row['name']; ?></div>
                                <div class="p-3 border-0 rounded-3 w-100" id="inputGroup-sizing-default"
                                    style="background-color: #0b6e4f;color: bisque;">
                                    <div class="row">
                                        <div class="col-md-5 mt-1 mb-1">
                                            <button id="view-info-button" class="rounded-3 p-3 border-0 h-100 w-100"
                                                style="background-color: rgba(218, 218, 218, 0.825); color:black;"> View
                                                Info <img src="Images And Icons/circle-info-solid.svg"
                                                    style="height: 14px; opacity: 100%; transform: translateY(-9%);"
                                                    alt=""></button>
                                        </div>
                                        <div style="text-align: justify;"
                                            class="col-md-7 mt-1 mb-1 align-items-center justify-content-center">
                                            Case No - <?php echo $row['caseno'] ?><br>
                                            File No - <?php echo "4" ?><br>
                                            Mobile No - <?php echo $row['mobile'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>



                <style>
                    .input-group-custom {
                        display: flex;
                        gap: 1rem;
                    }

                    .input-group-custom button {
                        flex: 1;
                        max-width: 10%;
                    }

                    .input-group-custom input {
                        flex: 1;
                        max-width: 42%;
                    }
                </style>


                <div>

                    <div class="justify-content-center align-items-center p-3 rounded-3 mt-3"
                        style="background-image: linear-gradient(90deg,#0b6e4f, #d1d3abb4);color: bisque; font-weight: 600; font-size: 20px;">
                        History
                        <img src="Images And Icons/clock-rotate-left-solid (3).svg" style="height: 20px; opacity: 95%;"
                            alt="">
                    </div>

                    <div class="history-div rounded-3" style="max-height: 45vh; overflow-y: scroll;">

                    


                        <div class="justify-content-center align-items-center mb-1 mt-3 p-3 rounded-3" style="background-color: #d1d3ab;">
                    
                            <div class="input-group">
                                <span class="p-3 border-0 rounded-3 w-100 mb-3" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; text-align: center; font-weight: 600; font-size: 20px;"><?php echo $display_date; ?></span>

                                <span class="p-3 border-0 rounded-3 me-auto" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; width: 49%;"><p> <?php echo $row2['remarks'];?> </p></span>
                                <span class="p-3 border-0 rounded-3 ms-auto" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; width: 49%;"><p> <?php
                                 //echo $row1['medicine']."--"; echo $row1['dose']."--".$row1["date"];
                                 foreach($row1 as $row34) {
                                    echo $row34['medicine']." -- ". $row34['dose']." -- ".$row34['date']."<br>";
                                }?> </p></span>
                            </div>
                        </div>










                    </div>




                </div>
            </div>

            <div class="col-md-6 right-box p-2">
                <form action="" method="post" enctype="multipart/form-data">

            <div class="rounded-3 p-3 " style="background-color: #d1d3ab;">



                <div class="input-group ">
                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                        style="border-top-left-radius:8px;border-bottom-left-radius:8px; color: bisque;">Date</span>
                    <input type="text" id="date" class="form-control border-0" name="date" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Enter Date">
                </div>

                <div class="input-group mt-3">
                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                        style="color: bisque;">Remarks</span>
                    <div class="form-floating">
                        <textarea class="form-control border-0" name="remarks" placeholder="Enter Remarks (if any)"
                            ></textarea>
                    </div>
                </div>
                <div class="input-group mt-3">
                    
                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                    style="color: bisque;">Photos</span>
                    <input class="form-control rounded-3 p-3 bg-light border-0 " name="file" style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" type="file" name="" placeholder="" aria-label="" id="file-upload">
                    <div class="w-100">

                        <input type="hidden" name="caseno" value="<?php $row['caseno'];?>">
            <!-- <label class="btn rounded-3 btn-checker w-100" for="file-upload"></label> -->

                    </div>
                </div>

                <div class="mt-3 rounded-3" style="max-height: 50vh;overflow-y: auto;">

                    <div id="input-fields">
                        <div class="input-group" style="max-height: 20vh;">
                            <span class="input-group-text w-100 rounded-3 p-3 border-0"
                                id="inputGroup-sizing-default"
                                style="color: bisque; font-weight: 600; font-size: 27px;">Prescriptions</span>

                            <div class="input-group mt-3 input-group-custom">
                                <input type="text" class="form-control p-3 border-0 rounded-3 me-auto"
                                    id="medicine-input" name="medicine[]" placeholder="Enter Medicine"
                                    style="background-color: #ffffff7a;color: black;">
                                <input type="text" class="form-control p-3 border-0 rounded-3 ms-auto"
                                    id="dose-input" name="dose[]" placeholder="Enter Dose"
                                    style="background-color: #ffffff85;color: black;">
                                <button type="button" class="form-control p-3 border-0 rounded-3 me-auto"
                                    id="remove" onclick="removeInputFields()"
                                    style="background-color: rgba(255, 0, 0, 0.521); color: bisque;">-</button>
                                <button type="button" class="form-control p-3 border-0 rounded-3 ms-auto"
                                    onclick="addInputFields()" id="add"
                                    style="background-color: #1da453;color: bisque;">+</button>
                            </div>
                        </div>
                    </div>


    </div>



</div>
<button id="payment-button" class="rounded-3 p-3 mt-3 border-0 w-100"
    style="background-color: #019fdece; color: bisque;">PAYMENT <img
        src="Images And Icons/arrow-right-solid (1).svg"
        style="height: 10px; opacity: 100%; transform: translateY(-15%);" alt=""></button>

</div>
            </form>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade rounded-3  border-0 " id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg border-0 ">
            <div class="modal-content border-0" style="background-color: #d1d3ab;">
                <div class="d-flex   modal-header border-0" style="background-color: #0b6e4f; color: bisque;">
                    <h5 class="modal-title" id="infoModalLabel">Patient Information</h5>
                    <button type="button" class="btn ms-auto me-2 d-flex edit-button" id="edit-button"
                        style="background-color: #22ba5f;">Edit</button>
                    <button type="button" class="btn-close  me-2  d-flex m-0" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: bisque;"></button>
                    <!-- <button type="button" class="btn btn-warning me-2 p-1" id="editButton" data-bs-dismiss="modal" aria-label="Edit">Edit</button> -->

                </div>
                <div class="modal-body rounded-3" style="background-color: #d1d3ab;">
                    <div class="row p-2">
                        <div class="col-md-4">
                            <p><strong>Name:</strong> <?php echo $row['name']?> <span id="modalName"></span></p>
                            <p><strong>Gender:</strong> <?php echo $row['gender']?> <span id="modalGender"></span></p>
                            <p><strong>Age:</strong> <?php echo $row['age']?> <span id="modalAge"></span></p>
                            <p><strong>DOB:</strong> <?php echo $row['dob']?> <span id="modalDOB"></span></p>
                            <p><strong>Marital Status:</strong> <?php echo $row['marital']?> <span id="modalMaritalStatus"></span></p>
                            <p><strong>Address:</strong> <?php echo $row['address']?> <span id="modalAddress"></span></p>
                            <p><strong>Contact No.:</strong> <?php echo $row['mobile']?> <span id="modalContact"></span></p>
                            <p><strong>Occupation:</strong> <?php echo $row['occupation']?> <span id="modalOccupation"></span></p>
                            <p><strong>Height:</strong> <?php echo $row['height']?> <span id="modalHeight"></span></p>
                            <p><strong>Weight:</strong> <?php echo $row['weight']?> <span id="modalWeight"></span></p>
                            <p><strong>Child:</strong> <?php echo $row['child']?> <span id="modalKgmChild"></span></p>
                            <p><strong>Blood Pressure:</strong> <?php echo $row['bp']?> <span id="modalBloodPressure"></span></p>
                            <p><strong>Pulse:</strong> <?php echo $row['pulse']?> <span id="modalPulse"></span></p>
                            <p><strong>Temperature:</strong> <?php echo $row['temperature']?> <span id="modalTemperature"></span></p>
                            <p><strong>Present Complaint:</strong> <?php echo $row['present']?> <span id="modalPresentComplaint"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Past History:</strong> <?php echo $row['past']?> <span id="modalPastHistory"></span></p>
                            <p><strong>Family History:</strong> <?php echo $row['family']?> <span id="modalFamilyHistory"></span></p>
                            <p><strong>Suffering from any other disease:</strong> <?php echo $row['disease']?> <span id="modalOtherDisease"></span>
                            </p>
                            <p><strong>Cause of disease if any:</strong> <?php echo $row['cause']?> <span id="modalCauseOfDisease"></span></p>
                            <p><strong>Head/Neck:</strong> <?php echo $row['head']?> <span id="modalHeadNeck"></span></p>
                            <!-- <p><strong>Mouth/Tongue:</strong> <?php echo $row['mouth']?> <span id="modalMouthTongue"></span></p> -->
                            <p><strong>Eye/Ear:</strong> <?php echo $row['eye']?> <span id="modalEyeEar"></span></p>
                            <p><strong>Face/Color:</strong> <?php echo $row['face']?> <span id="modalFaceColor"></span></p>
                            <p><strong>Nose:</strong> <?php echo $row['nose']?> <span id="modalNose"></span></p>
                            <p><strong>Respiratory:</strong> <?php echo $row['respiratory']?> <span id="modalChest"></span></p>
                            <p><strong>Cardiac:</strong> <?php echo $row['cardiac']?> <span id="modalChest"></span></p>
                        
                            <p><strong>Abdomen/Pelvis:</strong> <?php echo $row['abdomen']?> <span id="modalAbdomenPelvis"></span></p>
                            <p><strong>Menses:</strong> <?php echo $row['menses']?> <span id="modalGenitalia"></span></p>
                            <p><strong>Other DIscharge:</strong> <?php echo $row['other']?> <span id="modalChest"></span></p>

                        </div>
                        <div class="col-md-4">
                            <p><strong>Limb:</strong> <?php echo $row['limb']?> <span id="modalLimb"></span></p>
                            <p><strong>Back/Lumber:</strong> <?php echo $row['back']?> <span id="modalBackLumber"></span></p>
                            <p><strong>Skin/Condition/Perspiration:</strong> <?php echo $row['skin']?> <span
                                    id="modalSkinConditionPerspiration"></span></p>
                            <p><strong>Appetite:</strong> <?php echo $row['appetite']?> <span id="modalAppetite"></span></p>
                            <p><strong>Thirst:</strong> <?php echo $row['thirst']?> <span id="modalThirst"></span></p>
                            <p><strong>Stool:</strong> <?php echo $row['stool']?> <span id="modalStool"></span></p>
                            <p><strong>Urine:</strong> <?php echo $row['urine']?> <span id="modalUrine"></span></p>
                            <p><strong>Sleep/Dream:</strong> <?php echo $row['sleep']?> <span id="modalSleepDream"></span></p>
                            <p><strong>Discharge If Any:</strong> <?php echo $row['discharge']?> <span id="modalDischarge"></span></p>
                            <p><strong>Addiction If Any:</strong> <?php echo $row['addiction']?> <span id="modalAddiction"></span></p>
                            <p><strong>Desire:</strong> <?php echo $row['desire']?> <span id="modalDesire"></span></p>
                            <p><strong>Aversion:</strong> <?php echo $row['aversion']?> <span id="modalAversion"></span></p>
                            <p><strong>Aggravation:</strong> <?php echo $row['aggravation']?> <span id="modalAggravation"></span></p>
                            <p><strong>Amelioration:</strong> <?php echo $row['amelioration']?> <span id="modalAmelioration"></span></p>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <script src="checkup.js"></script>
    <script>
        $(document).ready(function () {
            var currentDate = new Date();
            var formattedDate = ('0' + (currentDate.getMonth() + 1)).slice(-2) + '/'
                + ('0' + (currentDate.getDate() + 0)).slice(-2) + '/'
                + currentDate.getFullYear();

            $('#date').val(formattedDate);

            $('#date').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true,
                endDate: "currentDate",
                maxDate: currentDate
            }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            $('#date').keyup(function () {
                if (this.value.match(/[^0-9/]/g)) {
                    this.value = this.value.replace(/[^0-9/]/g, '');
                }
            });
        });
        document.getElementById("payment-button").onclick = function () {
            location.href = "payment.php";
        };

        document.getElementById("view-info-button").onclick = function () {
            var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
            infoModal.show();
        };
        document.getElementById("edit-button").onclick = function () {
            location.href = "edit.php?caseno=<?php echo $row['caseno']?>";
        };


        function addInputFields() {
            var container = document.getElementById('input-fields');
            var newDiv = document.createElement('div');
            newDiv.classList.add('input-group', 'mt-3', 'input-group-custom');
            newDiv.innerHTML = `
                <input type="text" class="form-control p-3 border-0 rounded-3 me-auto" name="medicine[]" placeholder="Enter Medicine" aria-label="Enter Medicine" style="background-color: #ffffff7a;color: black;">
                <input type="text" class="form-control p-3 border-0 rounded-3 ms-auto" name="dose[]" placeholder="Enter Dose" aria-label="Enter Dose" style="background-color: #ffffff85;color: black;">
                <button type="button" class="form-control p-3 border-0 rounded-3 me-auto" onclick="removeInputFields(this)" style="background-color: rgba(255, 0, 0, 0.521); color: bisque;">-</button>
                <button type="button" class="form-control p-3 border-0 rounded-3 ms-auto" onclick="addInputFields()" style="background-color: #1da453;color: bisque;">+</button>
            `;
            container.appendChild(newDiv);
        }

        function removeInputFields(button) {
            button.parentElement.remove();
        }


        function removeInputFields() {
            var inputFields = document.getElementById('input-fields').children;
            var length = inputFields.length;

            if (length > 1) { // There will always be the first input-group, so check length > 1
                document.getElementById('input-fields').removeChild(inputFields[length - 1]);
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>