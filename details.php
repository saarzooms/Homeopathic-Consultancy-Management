<?php
try {
    $connect = new PDO("mysql:host=localhost;dbname=pdo", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $query = "INSERT INTO test_details (name, gender, age, dob, marital, complexion, constitution, address, mobile, occupation, height,
        weight, child, bp, pulse, temperature, present, past, family, disease, cause, mind, head, eye, face, nose, respiratory,
        cardiac, abdomen, menses, other, limb, back, skin, appetite, thirst, stool, urine, sleep, discharge, addiction, desire, aversion,
        aggravation, amelioration) VALUES (:name, :gender, :age, :dob, :marital, :complexion, :constitution, :address, :mobile, 
        :occupation, :height, :weight, :child, :bp, :pulse, :temperature, :present, :past, :family, :disease, :cause, :mind, :head, :eye,
        :face, :nose, :respiratory, :cardiac, :abdomen, :menses, :other, :limb, :back, :skin, :appetite, :thirst, :stool, :urine, :sleep, :discharge,
        :addiction, :desire, :aversion, :aggravation, :amelioration)";

        if (isset($_POST["mind"]) && !empty($_POST["mind"])) {
            $mind = implode(",", $_POST["mind"]);
        } else {
            $mind = "";
        }

        $user_data = array(
            ':name'           => $_POST["name"],
            ':gender'         => $_POST["gender"],
            ':age'            => $_POST["age"],
            ':dob'            => $_POST["dob"],
            ':marital'        => $_POST["marital"],
            ':complexion'     => $_POST["complexion"],
            ':constitution'   => $_POST["constitution"],
            ':address'        => $_POST["address"],
            ':mobile'         => $_POST["mobile"],
            ':occupation'     => $_POST["occupation"],
            ':height'         => $_POST["height"],
            ':weight'         => $_POST["weight"],
            ':child'          => $_POST["child"],
            ':bp'             => $_POST["bp"],
            ':pulse'          => $_POST["pulse"],
            ':temperature'    => $_POST["temperature"],
            ':present'        => $_POST["present"],
            ':past'           => $_POST["past"],
            ':family'         => $_POST["family"],
            ':disease'        => $_POST["disease"],
            ':cause'          => $_POST["cause"],
            ':mind'           => $mind,
            ':head'           => $_POST["head"],
            ':eye'            => $_POST["eye"],
            ':face'           => $_POST["face"],
            ':nose'           => $_POST["nose"],
            ':respiratory'    => $_POST["respiratory"],
            ':cardiac'        => $_POST["cardiac"],
            ':abdomen'        => $_POST["abdomen"],
            ':menses'         => $_POST["menses"],
            ':other'          => $_POST["other"],
            ':limb'           => $_POST["limb"],
            ':back'           => $_POST["back"],
            ':skin'           => $_POST["skin"],
            ':appetite'       => $_POST["appetite"],
            ':thirst'         => $_POST["thirst"],
            ':stool'          => $_POST["stool"],
            ':urine'          => $_POST["urine"],
            ':sleep'          => $_POST["sleep"],
            ':discharge'      => $_POST["discharge"],
            ':addiction'      => $_POST["addiction"],
            ':desire'         => $_POST["desire"],
            ':aversion'       => $_POST["aversion"],
            ':aggravation'    => $_POST["aggravation"],
            ':amelioration'   => $_POST["amelioration"]
        );

        $statement = $connect->prepare($query);
        if ($statement->execute($user_data)) {
            $message = '<div class="alert alert-success">Registration Completed Successfully</div>';
            $last_id = $connect->lastInsertId();
            $lab = $_POST['lab'];
            $remarks = $_POST['remarks'];
            $dt = $_POST['dt'];
             
            for($i = 0; $i < count($lab); $i++) {
                $lab_type = htmlspecialchars($lab[$i]);
                $date_lab = htmlspecialchars($dt[$i]);
                $remark = htmlspecialchars($remarks[$i]);
                $target_dir = "uploads/$last_id";
                if(!is_dir($target_dir)) 
                {mkdir($target_dir, 77, true);}

                $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);
                
                
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $fileTmpName = $_FILES["file"]["tmp_name"][$i];
                $fileSize = $_FILES["file"]["size"][$i];

                $check = getimagesize($fileTmpName);
                if ($check !== false || $fileType == "pdf") {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image or pdf.";
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($fileSize > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
                    && $fileType != "gif" && $fileType != "pdf") {
                    echo "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($fileTmpName, $target_file)) {
                        $query = "INSERT INTO lab_test (caseno, lab, date, remarks, file) VALUES (:caseno, :lab, :date, :remarks, :file)
                                  ON DUPLICATE KEY UPDATE file = VALUES(file)";
                        $lab_data = array(
                            ':caseno' => $last_id,
                            ':lab' => $lab_type,
                            ':date' => $date_lab,
                            ':remarks' => $remark,
                            ':file' => $target_file
                        );

                        $statement = $connect->prepare($query);
                        if ($statement->execute($lab_data)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"][$i])) . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file data.";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            $message = '<div class="alert alert-danger">There is an error in Registration</div>';
        }
    }
} catch (PDOException $e) {
    $message = '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
}
echo $message;
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


    <?php
// Include settings_config.php to get the file number
$config = include 'settings_config.php';
$file_number = $config['file_number'];
echo $file_number;
?>
        
        <div class="container justify-content-center align-items-center mt-5 p-lg-5 p-3 rounded-3 " style="background-color: #d1d3ab;">
            
                <form action="details.php" method="POST" id="detailsForm" enctype="multipart/form-data">
                    <div class="tab">
                        <div class="input-group ">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Name</span>
                            <input type="text" name="name" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Patient Name">
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" >Gender</span>
                            <select name="gender" class="form-select" aria-label="Gender select" style="border-top-right-radius:8px;border-bottom-right-radius:8px">
                                <option selected>Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            
                            
                        </div>

                        <div class="row">

    <div class="col-md-4">                        
        
        <div class="input-group  mt-3">

        <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" >Age</span>
    <input name="age" type="number" class="form-control border-0" aria-label="Sizing example input" style="border-top-right-radius:8px;border-bottom-right-radius:8px" aria-describedby="inputGroup-sizing-default" placeholder="Enter Age">
    
    </div>

    </div>
    <div class="col-md-4">

        <div class="input-group  mt-3">
            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" style="border-top-left-radius:8px;border-bottom-left-radius:8px">DOB</span>
            <input type="date" name="dob" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter DOB">
            
        </div>
        
    </div>
    <div class="col-md-4">

        <div class="input-group  mt-3">
            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Marital Status</span>
            <select name="marital" class="form-select" aria-label="status-select">
                <option selected>Marital Status</option>
                <option value="married">Married</option>
                <option value="unmarried">Unmarried</option>
                <option value="divorced">Divorced</option>
                <option value="widow">Widow</option>
            </select>
        </div>


    </div>




                        </div>

                        <div class="input-group  mt-3 ">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Complexion</span>
                            <input name="complexion" type="text" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Complexion">
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Constitution</span>
                            <input name="constitution" type="text" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Constitution">
                        </div>

                        
                        
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Address</span>
                            <div class="form-floating">
                                <textarea name="address" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                    </div>
            
                    <div class="tab" style="display:none;">
                    
                        
                            <div class="input-group  mt-3">
                                <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Contact No.</span>
                                <input name="mobile" type="number" style="border-top-right-radius:8px;border-bottom-right-radius:8px" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Contact No.">
                                
                            </div>
                
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Occupation</span>
                            <input name="occupation" type="text" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Occupation">
                        </div>


                        <div class="row">


                            <div class="col-md-6">

                                
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="height-input">Height</span>

                            <input name="height" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Height">
                            <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;"> in Metres</span>

                        </div>

                            </div>
                            <div class="col-md-6">

                                <div class="input-group  mt-3">
                                    <span class="input-group-text fixed-width p-3 border-0" id="weight-input">Weight</span>
                                    <input name="weight" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Weight">
                                    <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;"> in Kgs.</span>
                                </div>


                            </div>
                        </div>








                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group  mt-3">
                                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"> Child</span>
                                    <input name="child" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  mt-3">
                                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Bloodpressure</span>
                                    <input name="bp" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter BP">
                                    <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;"> in mmHg</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group  mt-3">
                                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Pulse</span>
                                    <input name="pulse" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Pulse">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  mt-3">
                                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Temperature</span>
                                    <input name="temperature" type="number" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Tempreature">
                                    <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); border-top-right-radius: 10px; border-bottom-right-radius: 10px;"> in Fahrenheit</span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Present Complain</span>
                            <div class="form-floating">
                                <textarea name="present" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    
                    <div class="tab" style="display:none;">
                        
                        
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Past History</span>
                            
                            <div class="form-floating">
                                <textarea name="past" class="form-control border-0 h-100" ></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Family History</span>
                            <div class="form-floating">
                                <textarea name="family" class="form-control border-0 h-100"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span  class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"><br><br><br><p>Suffering from <br/> any other disease</p></span>
                            <div class="form-floating ">
                                <textarea name="disease" class="form-control border-0 h-100"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"><br><br><br><p>Cause of disease <br/>if any</p></span>
                            <div class="form-floating ">
                                <textarea name="cause" class="form-control border-0 h-100"></textarea>         
                            </div>
                        </div>
                    </div>
            
                    
                    <div class="tab" style="display:none;">
                        
                        <div class="input-group mt-3">
                            <span class="input-group-text w-100 rounded-3 p-3 border-0 mb-3" id="inputGroup-sizing-default">Mind</span>
                            
                                <div class="btn-group p-3 bg-white row rounded-3 ms-1" role="group" aria-label="Basic checkbox toggle button group" style="width: 100%;">
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Absent Mind" class="btn-check " id="btncheck1" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck1">Absent Mind</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Forgetfulness" class="btn-check" id="btncheck2" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker  w-100" for="btncheck2">Forgetfulness</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Timid" class="btn-check" id="btncheck3" autocomplete="off">
                                        <label class="btn rounded-3  btn-checker w-100" for="btncheck3">Timid</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Jealousness" class="btn-check" id="btncheck4" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck4">Jealousness</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Suspicious" class="btn-check" id="btncheck5" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck5">Suspicious</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Confuse Minded" class="btn-check" id="btncheck6" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck6">Confuse Minded</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Over Sensitive" class="btn-check" id="btncheck7" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck7">Over Sensitive</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Sadness" class="btn-check" id="btncheck8" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck8">Sadness</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Aggressive" class="btn-check" id="btncheck9" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck9">Aggressive</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Angerness" class="btn-check" id="btncheck10" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck10">Angerness</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Hot Temprament" class="btn-check" id="btncheck11" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck11">Hot Temprament</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Overthinking" class="btn-check" id="btncheck12" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck12">Overthinking</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Proudy" class="btn-check" id="btncheck13" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck13">Proudy</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <input type="checkbox" name="mind[]" value="Over Proudy" class="btn-check" id="btncheck14" autocomplete="off">
                                        <label class="btn rounded-3 btn-checker w-100" for="btncheck14">Over Proudy</label>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <button type="reset"  id="clear-selection-button" class="btn rounded-3  w-100" style="">Clear Selection</button>
                                    </div>
                                </div>
                            
                            
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Head/Neck</span>
                            <div class="form-floating">
                                <textarea name="head" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Mouth/Tongue</span>
                            <div class="form-floating">
                                <textarea name="mouth" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                    </div>
                    <div class="tab" style="display:none;">
                        
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Eye/Ear</span>
                            <div class="form-floating">
                                <textarea name="eye" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" >Face/Color</span>
                            <div class="form-floating">
                                <textarea name="face" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Nose</span>
                            <div class="form-floating">
                                <textarea name="nose" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                                <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Chest</span>

                                    <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Respiratory</span>
                                    
                                    <input type="text" name="respiratory" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Remarks">
                    
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Chest</span>

                            <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Cardiac</span>
                            
                            <input type="text" name="cardiac" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Remarks">
                
                </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Abdomen/Pelvis</span>
                            <div class="form-floating">
                                <textarea name="abdomen" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                    </div>
            
                    <div class="tab" style="display:none;">
                    
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Genitalia</span>

                            <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Menses</span>
                            
                            <input name="menses" type="text" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Remarks">
                
                </div>
                <div class="input-group  mt-3">
                    <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Genitalia</span>

                    <span class="input-group-text p-3 border-0 fixed-width" id="inputGroup-sizing-default" style="background-color: #ffffff74; color: rgba(0, 0, 0, 0.661); "> Other Discharge</span>
                    
                    <input name="other" type="text" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Remarks">
        
        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Limb</span>
                            <div class="form-floating">
                                <textarea name="limb" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Back/Lumber</span>
                            <div class="form-floating">
                                <textarea name="back" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Skin/Condition/ <br/> Perspiration</span>
                            <div class="form-floating">
                                <textarea name="skin" class="form-control border-0 h-100"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Appetite</span>
                            <div class="form-floating">
                                <textarea name="appetite" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                    
                    </div>
            
                    <div class="tab" style="display:none;">
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Thirst</span>
                            <div class="form-floating">
                                <textarea name="thirst" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Stool</span>
                            <div class="form-floating">
                                <textarea name="stool" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Urine</span>
                            <div class="form-floating">
                                <textarea name="urine" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Sleep/Dream</span>
                            <div class="form-floating">
                                <textarea name="sleep" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Discharge If Any</span>
                            <div class="form-floating">
                                <textarea name="discharge" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Addiction If Any</span>
                            <div class="form-floating">
                                <textarea name="addiction" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        
                    </div>
            
                    <div class="tab" style="display:none;">
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Desire</span>
                            <div class="form-floating">
                                <textarea name="desire" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Aversion</span>
                            <div class="form-floating">
                                <textarea name="aversion" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Aggravation</span>
                            <div class="form-floating">
                                <textarea name="aggravation" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group  mt-3">
                            <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Amelioration</span>
                            <div class="form-floating">
                                <textarea name="amelioration" class="form-control border-0"></textarea>         
                            </div>
                        </div>
                        <div class="input-group mt-3" id="labtest">
                            <!-- <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default">Lab Test</span> -->
                            <span class="input-group-text w-100 rounded-3 p-3 border-0 mb-3" id="inputGroup-sizing-default">Lab Tests</span>

                            <select style="" name="lab[]" id="option" class="form-select" aria-label="status-select">
                                <option selected>Select Lab Test</option>
                                <option value="blood">Blood Test</option>
                                <option value="stool">Stool Test</option>
                                <option value="urine">Urine Test</option>
                                <option value="genetic">Genetic Test</option>
                                <option value="biopsy">Biopsy</option>
                            </select>
            <input type="date" name="dt[]" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter DOB">

                            <input name="remarks[]" type="text" class="form-control border-0" id="lab_remarks" style="width: 400px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Remarks">
                            <!-- <input type="file" class="form-control border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Occupation"> -->
                            
            <!-- <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" style="border-top-left-radius:8px;border-bottom-left-radius:8px">DOB</span> -->
            
        
                            <input class="form-control  p-3 bg-light border-0 " style="width: 50px;" type="file" name="file[]" placeholder="" aria-label="" id="file-upload">
                            
                                <!-- <input type="file" class="form-control border-0 vh-10" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"> -->
                                <button class="btn btn-danger" onclick="deletelab()" type="button" id=""><i class="fa-solid fa-trash"></i></button>
                                <button class="btn btn-success" onclick="savelab()" type="button" id="inputGroupFileAddon04">Save</button>
                                <button class="btn btn-primary" onclick="addlab()" type="button" id="">Add</button>

                            
                        </div>
                        
                    </div>
                    <div class="input-group mt-3 ">
                        <button class="btn p-3 rounded-3 form-control" id="prev" onclick="nextprev(event,-1)" style="background-color: #1da453; color: white; display: none;">Previous</button>
                        <button class="btn p-3 rounded-3 form-control" id="next" onclick="nextprev(event,1)" style="background-color: #1da453; color: white;">Next</button>
                    </div>
                    
                </form>
            
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            
                function savelab() {
                var inputField = document.getElementById("lab_remarks");
                var button = document.getElementById("inputGroupFileAddon04");
                var option = document.getElementById("option");
                var file = document.getElementById("file-upload");
                if (inputField.disabled) {
                    file.disabled = false;
                    inputField.disabled = false;
                    button.innerHTML = "Save";
                    option.disabled = false;
                    
                } else {
                    inputField.disabled = true;
                    file.disabled = true;
                    option.disabled = true;
                    button.innerHTML = "Edit";
                }
                }
                function addlab(){
    var container = document.createElement('div');
    container.setAttribute('class', 'input-group mt-3');

    var select = document.createElement('select');
    select.setAttribute('name', 'lab[]');
    select.setAttribute('class', 'form-select');
    select.innerHTML = `
        <option selected>Select Lab Test</option>
        <option value="blood">Blood Test</option>
        <option value="stool">Stool Test</option>
        <option value="urine">Urine Test</option>
        <option value="genetic">Genetic Test</option>
        <option value="biopsy">Biopsy</option>
    `;
    container.appendChild(select);

    var dateInput = document.createElement('input');
    dateInput.setAttribute('type', 'date');
    dateInput.setAttribute('name', 'dt[]');
    dateInput.setAttribute('class', 'form-control border-0');
    dateInput.setAttribute('placeholder', 'Enter Date');
    container.appendChild(dateInput);

    var remarksInput = document.createElement('input');
    remarksInput.setAttribute('type', 'text');
    remarksInput.setAttribute('name', 'remarks[]');
    remarksInput.setAttribute('class', 'form-control border-0');
    remarksInput.setAttribute('placeholder', 'Remarks');
    remarksInput.style.width = '400px';
    container.appendChild(remarksInput);

    var fileInput = document.createElement('input');
    fileInput.setAttribute('type', 'file');
    fileInput.setAttribute('name', 'file[]');
    fileInput.setAttribute('class', 'form-control p-3 bg-light border-0');
    container.appendChild(fileInput);

    var deleteButton = document.createElement('button');
    deleteButton.setAttribute('class', 'btn btn-danger');
    deleteButton.setAttribute('type', 'button');
    deleteButton.innerHTML = 'Delete';
    deleteButton.onclick = function() {
        container.remove();
    };
    container.appendChild(deleteButton);


    var saveButton = document.createElement('button');
    saveButton.setAttribute('class', 'btn btn-success');
    saveButton.setAttribute('type', 'button');
    saveButton.innerHTML = 'Save';
    saveButton.onclick = function() {
        
    };
    container.appendChild(saveButton);

    var addButton = document.createElement('button');
    addButton.setAttribute('class', 'btn btn-primary');
    addButton.setAttribute('type', 'button');
    addButton.innerHTML = 'Add';
    addButton.onclick = function() {
        addlab();
    };
    container.appendChild(addButton);

    document.querySelector('#labtest').appendChild(container);
}

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
                    document.getElementById("next").innerHTML = "Submit";
                } else {
                    document.getElementById("next").innerHTML = "Next";
                }
            }

            function nextprev(event,n) {
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