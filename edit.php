<?php
include 'config.php';

// Fetching patient details if 'caseno' is provided in GET request
if (isset($_GET['caseno'])) {
    $caseno = $_GET['caseno'];

    $sql = "SELECT * FROM test_details WHERE caseno = $caseno";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No patient found with case number $caseno";
        }
        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Case number not provided";
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['caseno'])) {
    $caseno = $_POST['caseno'];
    $mind = isset($_POST["mind"]) ? implode(",", $_POST["mind"]) : "";

    // Use prepared statement for UPDATE query
    $query = "UPDATE test_details SET
                    name = ?,
                    gender = ?,
                    age = ?,
                    dob = ?,
                    marital = ?,
                    complexion = ?,
                    constitution = ?,
                    address = ?,
                    mobile = ?,
                    occupation = ?,
                    height = ?,
                    weight = ?,
                    child = ?,
                    bp = ?,
                    pulse = ?,
                    temperature = ?,
                    present = ?,
                    past = ?,
                    family = ?,
                    disease = ?,
                    cause = ?,
                    mind = ?,
                    head = ?,
                    eye = ?,
                    face = ?,
                    nose = ?,
                    respiratory = ?,
                    cardiac = ?,
                    abdomen = ?,
                    menses = ?,
                    other = ?,
                    limb = ?,
                    back = ?,
                    skin = ?,
                    appetite = ?,
                    thirst = ?,
                    stool = ?,
                    urine = ?,
                    sleep = ?,
                    discharge = ?,
                    addiction = ?,
                    desire = ?,
                    aversion = ?,
                    aggravation = ?,
                    amelioration = ?
                  WHERE caseno = ?";
                  
    $statement = $conn->prepare($query);

    if ($statement) {
        // Assuming some fields are integers and the rest are strings
        $statement->bind_param("ssisssssssssssssssssssssssssssssssssssssssi",
            $_POST["name"],
            $_POST["gender"],
            $_POST["age"],  // Assuming age is an integer
            $_POST["dob"],
            $_POST["marital"],
            $_POST["complexion"],
            $_POST["constitution"],
            $_POST["address"],
            $_POST["mobile"],
            $_POST["occupation"],
            $_POST["height"],
            $_POST["weight"],
            $_POST["child"],
            $_POST["bp"],
            $_POST["pulse"],
            $_POST["temperature"],
            $_POST["present"],
            $_POST["past"],
            $_POST["family"],
            $_POST["disease"],
            $_POST["cause"],
            $mind,
            $_POST["head"],
            $_POST["eye"],
            $_POST["face"],
            $_POST["nose"],
            $_POST["respiratory"],
            $_POST["cardiac"],
            $_POST["abdomen"],
            $_POST["menses"],
            $_POST["other"],
            $_POST["limb"],
            $_POST["back"],
            $_POST["skin"],
            $_POST["appetite"],
            $_POST["thirst"],
            $_POST["stool"],
            $_POST["urine"],
            $_POST["sleep"],
            $_POST["discharge"],
            $_POST["addiction"],
            $_POST["desire"],
            $_POST["aversion"],
            $_POST["aggravation"],
            $_POST["amelioration"],
            $caseno  // Assuming caseno is an integer
        );

        if ($statement->execute()) {
            echo '<div name="" class="alert alert-success">Record Updated Successfully</div>';
        } else {
            echo '<div name="" class="alert alert-danger">There was an error updating the record: ' . $statement->error . '</div>';
        }
        $statement->close();
    } else {
        echo "Failed to prepare the SQL statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Case number not provided";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Example</title>
    <link rel="stylesheet" href="details.css">
</head>

<body style="background-color: #0b6e4f">

    <div name="" class="container justify-content-center align-items-center mt-5 p-lg-5 p-3 rounded-3 "
        style="background-color: #d1d3ab;">

        <form action="edit.php" method="POST" id="detailsForm" enctype="multipart/form-data">
            <div name="" class="tab">
                <div name="" class="input-group ">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Name</span>
                    <input type="text" name="name" class="form-control border-0" aria-label="Sizing example input" value = "<?php echo $row['name'];?>"
                        aria-describedby="inputGroup-sizing-default" placeholder="Enter Patient Name">
                </div>
                <div name="" class="input-group  mt-3">
                    
                    <span name="" class="input-group-text fixed-width p-3 border-0" >Gender</span>

                    <?php
$selectedOption = trim($row['gender'] ?? ''); // Assuming $row['gender'] contains the selected option value
$selectedOption = strtolower($selectedOption); // Convert to lowercase for case-insensitive comparison
// Debugging: Output the selected option
// echo "Selected Option: $selectedOption <br>";

switch ($selectedOption) {
    case 'male':
        // echo "Case: Male<br>";
        $maleSelected = 'selected';
        $femaleSelected = '';
        $otherSelected = '';
        break;
    case 'female':
        // echo "Case: Female<br>";
        $maleSelected = '';
        $femaleSelected = 'selected';
        $otherSelected = '';
        break;
    case 'other':
        // echo "Case: Other<br>";
        $maleSelected = '';
        $femaleSelected = '';
        $otherSelected = 'selected';
        break;
    default:
        // echo "Case: Default<br>";
        $maleSelected = '';
        $femaleSelected = '';
        $otherSelected = '';
        break;
}
?>

<select id="genderSelect" name="gender" class="form-select" aria-label="Gender select">
    <option value="Male" <?php echo $maleSelected; ?>>Male</option>
    <option value="Female" <?php echo $femaleSelected; ?>>Female</option>
    <option value="Other" <?php echo $otherSelected; ?>>Other</option>
</select>

          


   




                </div>

                <div name="" class="row">

                    <div name="" class="col-md-4">

                        <div name="" class="input-group  mt-3">

                            <span name="" class="input-group-text fixed-width p-3 border-0"
                                id="inputGroup-sizing-default">Age</span>
                            <input type="number" name="age" class="form-control border-0" aria-label="Sizing example input"
                                style="border-top-right-radius:8px;border-bottom-right-radius:8px"
                                aria-describedby="inputGroup-sizing-default" placeholder="Enter Age" value="<?php echo $row['age'];?>">

                        </div>

                    </div>
                    <div name="" class="col-md-4">

                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                                style="border-top-left-radius:8px;border-bottom-left-radius:8px">DOB</span>
                            <input type="date" name="dob" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" placeholder="Enter DOB" value="<?php echo $row['dob'];?>">

                        </div>

                    </div>
                    <div name="" class="col-md-4">

                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0"
                                id="inputGroup-sizing-default">Marital Status</span>
                                <?php
$selectedStatus = $row['marital']; 
$selectedStatus = trim($selectedStatus);


$marriedSelected = '';
$singleSelected = '';
$divorcedSelected = '';
$widowSelected = '';

switch (strtolower($selectedStatus)) {
    case 'married':
        // echo "Selected Option: Married\n";
        $marriedSelected = 'selected';
        break;
    case 'single':
        // echo "Selected Option: Single\n";
        $singleSelected = 'selected';
        break;
    case 'divorced':
        // echo "Selected Option: Divorced\n";
        $divorcedSelected = 'selected';
        break;
    case 'widow':
        // echo "Selected Option: Widow\n";
        $widowSelected = 'selected';
        break;
    default:
        // echo "Selected Option: '" . $selectedStatus . "'\n";
        echo "Case: Default\n";
        break;
}
?>

<select name="marital" class="form-select" aria-label="status-select">
    <option value="" <?php echo empty($selectedStatus) ? 'selected' : ''; ?>>Marital Status</option>
    <option value="married" <?php echo $marriedSelected; ?>>Married</option>
    <option value="single" <?php echo $singleSelected; ?>>Single</option>
    <option value="divorced" <?php echo $divorcedSelected; ?>>Divorced</option>
    <option value="widow" <?php echo $widowSelected; ?>>Widow</option>
</select>






                        </div>


                    </div>




                </div>

                <div name="" class="input-group  mt-3 ">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Complexion</span>
                    <input type="text" value = "<?php echo $row['complexion'];?>" name="complexion" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Enter Complexion">
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Constitution</span>
                    <input type="text"value="<?php echo $row['constitution'];?>" name="constitution" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Enter Constitution">
                </div>



                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Address</span>
                    <div name="" class="form-floating">
                        <textarea name="address" class="form-control border-0" ><?php echo $row['address'];?></textarea>
                    </div>
                </div>
            </div>

            <div name="" class="tab" style="display:none;">


                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Contact
                        No.</span>
                    <input type="number" style="border-top-right-radius:8px;border-bottom-right-radius:8px"
                        name="mobile" class="form-control border-0" value="<?php echo $row['mobile'];?>" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Enter Contact No.">

                </div>

                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default" > Occupation</span>
                    <input type="text" name="occupation" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" value="<?php echo $row['occupation'];?>"  placeholder="Enter Occupation">
                </div>


                <div name="" class="row">


                    <div name="" class="col-md-6">


                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0" id="height-input">Height</span>

                            <input type="number" name="height" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"  value="<?php echo $row['height'];?>"  placeholder="Enter Height">
                            <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                                style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                in Metres</span>

                        </div>

                    </div>
                    <div name="" class="col-md-6">

                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0" id="weight-input">Weight</span>
                            <input type="number" name="weight" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $row['weight'];?>"  placeholder="Enter Weight">
                            <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                                style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                in Kgs.</span>
                        </div>


                    </div>
                </div>








                <div name="" class="row">
                    <div name="" class="col-md-6">
                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">
                                Child</span>
                            <input type="number" name="child" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $row['child'];?>"  placeholder="">
                        </div>
                    </div>
                    <div name="" class="col-md-6">
                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0"
                                id="inputGroup-sizing-default">Bloodpressure</span>
                            <input type="number" name="bp" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $row['bp'];?>"   placeholder="Enter BP">
                            <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                                style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                in mmHg</span>
                        </div>
                    </div>
                </div>

                <div name="" class="row">
                    <div name="" class="col-md-6">
                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0"
                                id="inputGroup-sizing-default">Pulse</span>
                            <input type="number" value="<?php echo $row['pulse'];?>" name="pulse" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" placeholder="Enter Pulse">
                        </div>
                    </div>
                    <div name="" class="col-md-6">
                        <div name="" class="input-group  mt-3">
                            <span name="" class="input-group-text fixed-width p-3 border-0"
                                id="inputGroup-sizing-default">Temperature</span>
                            <input type="number" value="<?php echo $row['temperature'];?>" name="temperature" class="form-control border-0" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" placeholder="Enter Tempreature">
                            <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                                style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                in Fahrenheit</span>
                        </div>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Present
                        Complain</span>
                    <div name="" class="form-floating">
                        <textarea name="present" class="form-control border-0"><?php echo $row['present'];?></textarea>
                    </div>
                </div>


            </div>


            <div name="" class="tab" style="display:none;">


                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Past
                        History</span>

                    <div name="" class="form-floating">
                        <textarea name="past" class="form-control border-0 h-100"><?php echo $row['past'];?></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Family
                        History</span>
                    <div name="" class="form-floating">
                        <textarea name="family" class="form-control border-0 h-100"><?php echo $row['family'];?></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"><br><br><br>
                        <p>Suffering from <br /> any other disease</p>
                    </span>
                    <div name="" class="form-floating ">
                        <textarea name="disease" class="form-control border-0 h-100"><?php echo $row['disease'];?></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"><br><br><br>
                        <p>Cause of disease <br />if any</p>
                    </span>
                    <div name="" class="form-floating ">
                        <textarea name="cause" class="form-control border-0 h-100"><?php echo $row['cause'];?></textarea>
                    </div>
                </div>
            </div>



            <?php

$mindField = $row['mind'] ?? ''; 
$selectedMindOptions = array_map('trim', explode(',', $mindField));


function isSelected($value, $selectedOptions) {
    
    $isSelected = in_array($value, $selectedOptions);
    // echo "Checking if '$value' is selected: " . ($isSelected ? 'Yes' : 'No') . "<br>";
    return $isSelected;
}
?>

<div name="" class="tab" style="display:none;">
    <div name="" class="input-group mt-3">
        <span name="" class="input-group-text w-100 rounded-3 p-3 border-0 mb-3" id="inputGroup-sizing-default">Mind</span>

        <div name="" class="btn-group p-3 bg-white row rounded-3 ms-1" role="group" aria-label="Basic checkbox toggle button group" style="width: 100%;">
            <?php
            $options = [
                'Absent Mind', 'Forgetfulness', 'Timid', 'Jealousness', 'Suspicious',
                'Confuse Minded', 'Over Sensitive', 'Sadness', 'Aggressive', 'Angerness',
                'Hot Temprament', 'Overthinking', 'Proudy', 'Over Proudy'
            ];

            foreach ($options as $index => $option): 
                $isChecked = isSelected($option, $selectedMindOptions) ? 'checked' : '';
                // echo "Option: '$option', Checked: '$isChecked'<br>";
                ?>
                <div name="" class="col-md-4 d-flex align-items-center">
                    <input type="checkbox" name="" class="btn-check" id="btncheck<?php echo $index + 1; ?>" autocomplete="off" <?php echo $isChecked; ?>>
                    <label name="" class="btn rounded-3 btn-checker w-100" for="btncheck<?php echo $index + 1; ?>"><?php echo $option; ?></label>
                </div>
            <?php endforeach; ?>
            <div name="" class="col-md-4 d-flex align-items-center">
                <button type="reset" id="clear-selection-button" name="" class="btn rounded-3 w-100">Clear Selection</button>
            </div>
        </div>
    </div>




    <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Head/Neck</span>
                    <div name="" class="form-floating">
                        <textarea name="head" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Mouth/Tongue</span>
                    <div name="" class="form-floating">
                        <textarea name="mouth" class="form-control border-0"></textarea>
                    </div>
                </div>






</div>



            <div name="" class="tab" style="display:none;">








                

                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Eye/Ear</span>
                    <div name="" class="form-floating">
                        <textarea name="eye" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0">Face/Color</span>
                    <div name="" class="form-floating">
                        <textarea name="face" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Nose</span>
                    <div name="" class="form-floating">
                        <textarea name="nose" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Chest</span>

                    <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                        style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Respiratory</span>

                    <input type="text" name="respiratory" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Remarks">

                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Chest</span>

                    <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                        style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Cardiac</span>

                    <input type="text" name="cardiac" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Remarks">

                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Abdomen/Pelvis</span>
                    <div name="" class="form-floating">
                        <textarea name="abdomen" class="form-control border-0"></textarea>
                    </div>
                </div>
            </div>

            <div name="" class="tab" style="display:none;">

                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Genitalia</span>

                    <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                        style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Menses</span>

                    <input type="text" name="menses" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Remarks">

                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Genitalia</span>

                    <span name="" class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default"
                        style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Other Discharge</span>

                    <input type="text" name="other" class="form-control border-0" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" placeholder="Remarks">

                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Limb</span>
                    <div name="" class="form-floating">
                        <textarea name="limb" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Back/Lumber</span>
                    <div name="" class="form-floating">
                        <textarea name="back" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Skin/Condition/ <br /> Perspiration</span>
                    <div name="" class="form-floating">
                        <textarea name="skin" class="form-control border-0 h-100"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Appetite</span>
                    <div name="" class="form-floating">
                        <textarea name="appetite" class="form-control border-0"></textarea>
                    </div>
                </div>

            </div>

            <div name="" class="tab" style="display:none;">
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Thirst</span>
                    <div name="" class="form-floating">
                        <textarea name="thirst" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Stool</span>
                    <div name="" class="form-floating">
                        <textarea name="stool" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Urine</span>
                    <div name="" class="form-floating">
                        <textarea name="urine" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Sleep/Dream</span>
                    <div name="" class="form-floating">
                        <textarea name="sleep" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Discharge If
                        Any</span>
                    <div name="" class="form-floating">
                        <textarea name="discharge" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Addiction If
                        Any</span>
                    <div name="" class="form-floating">
                        <textarea name="addiction" class="form-control border-0"></textarea>
                    </div>
                </div>

            </div>

            <div name="" class="tab" style="display:none;">
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Desire</span>
                    <div name="" class="form-floating">
                        <textarea name="desire" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Aversion</span>
                    <div name="" class="form-floating">
                        <textarea name="aversion" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Aggravation</span>
                    <div name="" class="form-floating">
                        <textarea name="aggravation" class="form-control border-0"></textarea>
                    </div>
                </div>
                <div name="" class="input-group  mt-3">
                    <span name="" class="input-group-text fixed-width p-3 border-0"
                        id="inputGroup-sizing-default">Amelioration</span>
                    <div name="" class="form-floating">
                        <textarea name="amelioration" class="form-control border-0"></textarea>
                    </div>
                </div>
            </div>
            <div name="" class="input-group mt-3 ">
                <button name="" class="btn p-3 rounded-3 form-control" id="prev" onclick="nextprev(event,-1)"
                    style="background-color: #1da453; color: white; display: none;">Previous</button>
                <button name="" class="btn p-3 rounded-3 form-control" id="next" onclick="nextprev(event,1)"
                    style="background-color: #1da453; color: white;">Next</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        var currentTab = 0;;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prev").style.display = "none";
                document.getElementById("next").style.marginLeft = "0px";
            } else {
                document.getElementById("next").style.marginLeft = "10px";
                document.getElementById("prev").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("next").innerHTML = "Update";
            } else {
                document.getElementById("next").innerHTML = "Next";
            }
        }

        function nextprev(event, n) {
            event.preventDefault();
            var x = document.getElementsByClassName("tab");
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("detailsForm").submit();
                alert("Form submitted!");
                return false;
            }

            showTab(currentTab);
        }




        const heightInput = document.getElementById("height-input"); // Select height input
        const weightInput = document.getElementById("weight-input"); // Select weight input

        function displayUnit(input, unit) {
            input.addEventListener('input', () => {
                input.value = input.value.trim() + unit;
                console.log(unit) // Add unit after removing trailing spaces
            });
        }

        displayUnit(heightInput, 'cm'); // Set unit for height (change 'cm' to your desired unit)
        displayUnit(weightInput, 'kg'); // Set unit for weight (change 'kg' to your desired unit)    
    </script>

</body>

</html>