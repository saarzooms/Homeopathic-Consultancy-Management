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
                                    <?php  echo "Umang Ketanbhai Hirani" ?></div>
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
                                            Case No - <?php echo "100" ?><br>
                                            File No - <?php echo "4" ?><br>
                                            <?php echo "7984940336" ?>
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
                                <span class="p-3 border-0 rounded-3 w-100 mb-3" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; text-align: center; font-weight: 600; font-size: 20px;">30/10/2004</span>
                                <span class="p-3 border-0 rounded-3 me-auto" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; width: 49%;"><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas asperiores dolores maiores fugit facilis ipsam ab, m, nemo provident quae ad  </p></span>
                                <span class="p-3 border-0 rounded-3 ms-auto" id="inputGroup-sizing-default" style="background-color: #0b6e4f;color: bisque; width: 49%;"><p>Medicine No. 1 x 3 Doze</p><p>Medicine No. 1 x 3 Doze</p><p>Medicine No. 1 x 3 Doze</p><p>Medicine No. 1 x 3 Doze</p</span>
                            </div>
                        </div>










                    </div>




                </div>
            </div>

            <div class="col-md-6 right-box p-2">

                <div class="rounded-3 p-3 " style="background-color: #d1d3ab;">



                    <div class="input-group ">
                        <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                            style="border-top-left-radius:8px;border-bottom-left-radius:8px; color: bisque;">Date</span>
                        <input type="text" id="date" class="form-control border-0" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Enter Date">
                    </div>

                    <div class="input-group mt-3">
                        <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                            style="color: bisque;">Remarks</span>
                        <div class="form-floating">
                            <textarea class="form-control border-0" placeholder="Enter Remarks (if any)"
                                ></textarea>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        
                        <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default"
                        style="color: bisque;">Photos</span>
                        <input class="form-control rounded-3 p-3 bg-light border-0 " style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;" type="file" name="" placeholder="" aria-label="" id="file-upload">
                        <div class="w-100">

                            
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
                            <p><strong>Name:</strong> <span id="modalName"></span></p>
                            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
                            <p><strong>Age:</strong> <span id="modalAge"></span></p>
                            <p><strong>DOB:</strong> <span id="modalDOB"></span></p>
                            <p><strong>Marital Status:</strong> <span id="modalMaritalStatus"></span></p>
                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                            <p><strong>Contact No.:</strong> <span id="modalContact"></span></p>
                            <p><strong>Occupation:</strong> <span id="modalOccupation"></span></p>
                            <p><strong>Height:</strong> <span id="modalHeight"></span></p>
                            <p><strong>Weight:</strong> <span id="modalWeight"></span></p>
                            <p><strong>Kgm Child:</strong> <span id="modalKgmChild"></span></p>
                            <p><strong>Blood Pressure:</strong> <span id="modalBloodPressure"></span></p>
                            <p><strong>Pulse:</strong> <span id="modalPulse"></span></p>
                            <p><strong>Temperature:</strong> <span id="modalTemperature"></span></p>
                            <p><strong>Present Complaint:</strong> <span id="modalPresentComplaint"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Past History:</strong> <span id="modalPastHistory"></span></p>
                            <p><strong>Family History:</strong> <span id="modalFamilyHistory"></span></p>
                            <p><strong>Suffering from any other disease:</strong> <span id="modalOtherDisease"></span>
                            </p>
                            <p><strong>Cause of disease if any:</strong> <span id="modalCauseOfDisease"></span></p>
                            <p><strong>Head/Neck:</strong> <span id="modalHeadNeck"></span></p>
                            <p><strong>Mouth/Tongue:</strong> <span id="modalMouthTongue"></span></p>
                            <p><strong>Eye/Ear:</strong> <span id="modalEyeEar"></span></p>
                            <p><strong>Face/Color:</strong> <span id="modalFaceColor"></span></p>
                            <p><strong>Nose:</strong> <span id="modalNose"></span></p>
                            <p><strong>Chest:</strong> <span id="modalChest"></span></p>
                            <p><strong>Abdomen/Pelvis:</strong> <span id="modalAbdomenPelvis"></span></p>
                            <p><strong>Genitalia:</strong> <span id="modalGenitalia"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Limb:</strong> <span id="modalLimb"></span></p>
                            <p><strong>Back/Lumber:</strong> <span id="modalBackLumber"></span></p>
                            <p><strong>Skin/Condition/Perspiration:</strong> <span
                                    id="modalSkinConditionPerspiration"></span></p>
                            <p><strong>Appetite:</strong> <span id="modalAppetite"></span></p>
                            <p><strong>Thirst:</strong> <span id="modalThirst"></span></p>
                            <p><strong>Stool:</strong> <span id="modalStool"></span></p>
                            <p><strong>Urine:</strong> <span id="modalUrine"></span></p>
                            <p><strong>Sleep/Dream:</strong> <span id="modalSleepDream"></span></p>
                            <p><strong>Discharge If Any:</strong> <span id="modalDischarge"></span></p>
                            <p><strong>Addiction If Any:</strong> <span id="modalAddiction"></span></p>
                            <p><strong>Desire:</strong> <span id="modalDesire"></span></p>
                            <p><strong>Aversion:</strong> <span id="modalAversion"></span></p>
                            <p><strong>Aggravation:</strong> <span id="modalAggravation"></span></p>
                            <p><strong>Amelioration:</strong> <span id="modalAmelioration"></span></p>
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
            location.href = "edit.php";
        };


        function addInputFields() {
            var container = document.getElementById('input-fields');
            var newDiv = document.createElement('div');
            newDiv.classList.add('input-group', 'mt-3', 'input-group-custom');
            newDiv.innerHTML = `
                <input type="text" class="form-control p-3 border-0 rounded-3 me-auto" name="medicine[]" placeholder="Enter Medicine" aria-label="Enter Medicine" style="background-color: #ffffff7a;color: black;">
                <input type="text" class="form-control p-3 border-0 rounded-3 ms-auto" name="dose[]" placeholder="Enter Dose" aria-label="Enter Dose" style="background-color: #ffffff85;color: black;">
                <button class="form-control p-3 border-0 rounded-3 me-auto" onclick="removeInputFields(this)" style="background-color: rgba(255, 0, 0, 0.521); color: bisque;">-</button>
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
    <script>
        // Pseudo information
        var patientInfo = {
            name: "John Doe",
            gender: "Male",
            age: 35,
            dob: "1989-05-15",
            maritalStatus: "Married",
            address: "123 Main Street, Cityville",
            contact: "555-123-4567",
            occupation: "Engineer",
            height: "180 cm",
            weight: "75 kg",
            kgmChild: "2",
            bloodPressure: "120/80 mmHg",
            pulse: "70 bpm",
            temperature: "37.0°C",
            presentComplaint: "Headache and fever",
            pastHistory: "No significant past medical history",
            familyHistory: "Father had hypertension",
            otherDisease: "No",
            causeOfDisease: "Unknown",
            headNeck: "No abnormalities",
            mouthTongue: "Normal appearance",
            eyeEar: "Normal examination",
            faceColor: "Normal color",
            nose: "No abnormalities",
            chest: "Clear lung fields",
            abdomenPelvis: "Soft and non-tender",
            genitalia: "Normal examination",
            limb: "Full range of motion",
            backLumber: "No abnormalities",
            skinConditionPerspiration: "No rashes or lesions",
            appetite: "Normal",
            thirst: "Normal",
            stool: "Normal consistency",
            urine: "Normal color and clarity",
            sleepDream: "Normal sleep patterns",
            discharge: "None",
            addiction: "None",
            desire: "None",
            aversion: "None",
            aggravation: "None",
            amelioration: "None"
        };

        // Function to fill modal with patient information
        function fillModal() {
            document.getElementById("modalName").innerText = patientInfo.name;
            document.getElementById("modalGender").innerText = patientInfo.gender;
            document.getElementById("modalAge").innerText = patientInfo.age;
            document.getElementById("modalDOB").innerText = patientInfo.dob;
            document.getElementById("modalMaritalStatus").innerText = patientInfo.maritalStatus;
            document.getElementById("modalAddress").innerText = patientInfo.address;
            document.getElementById("modalContact").innerText = patientInfo.contact;
            document.getElementById("modalOccupation").innerText = patientInfo.occupation;
            document.getElementById("modalHeight").innerText = patientInfo.height;
            document.getElementById("modalWeight").innerText = patientInfo.weight;
            document.getElementById("modalKgmChild").innerText = patientInfo.kgmChild;
            document.getElementById("modalBloodPressure").innerText = patientInfo.bloodPressure;
            document.getElementById("modalPulse").innerText = patientInfo.pulse;
            document.getElementById("modalTemperature").innerText = patientInfo.temperature;
            document.getElementById("modalPresentComplaint").innerText = patientInfo.presentComplaint;
            document.getElementById("modalPastHistory").innerText = patientInfo.pastHistory;
            document.getElementById("modalFamilyHistory").innerText = patientInfo.familyHistory;
            document.getElementById("modalOtherDisease").innerText = patientInfo.otherDisease;
            document.getElementById("modalCauseOfDisease").innerText = patientInfo.causeOfDisease;
            document.getElementById("modalHeadNeck").innerText = patientInfo.headNeck;
            document.getElementById("modalMouthTongue").innerText = patientInfo.mouthTongue;
            document.getElementById("modalEyeEar").innerText = patientInfo.eyeEar;
            document.getElementById("modalFaceColor").innerText = patientInfo.faceColor;
            document.getElementById("modalNose").innerText = patientInfo.nose;
            document.getElementById("modalChest").innerText = patientInfo.chest;
            document.getElementById("modalAbdomenPelvis").innerText = patientInfo.abdomenPelvis;
            document.getElementById("modalGenitalia").innerText = patientInfo.genitalia;
            document.getElementById("modalLimb").innerText = patientInfo.limb;
            document.getElementById("modalBackLumber").innerText = patientInfo.backLumber;
            document.getElementById("modalSkinConditionPerspiration").innerText = patientInfo.skinConditionPerspiration;
            document.getElementById("modalAppetite").innerText = patientInfo.appetite;
            document.getElementById("modalThirst").innerText = patientInfo.thirst;
            document.getElementById("modalStool").innerText = patientInfo.stool;
            document.getElementById("modalUrine").innerText = patientInfo.urine;
            document.getElementById("modalSleepDream").innerText = patientInfo.sleepDream;
            document.getElementById("modalDischarge").innerText = patientInfo.discharge;
            document.getElementById("modalAddiction").innerText = patientInfo.addiction;
            document.getElementById("modalDesire").innerText = patientInfo.desire;
            document.getElementById("modalAversion").innerText = patientInfo.aversion;
            document.getElementById("modalAggravation").innerText = patientInfo.aggravation;
            document.getElementById("modalAmelioration").innerText = patientInfo.amelioration;
        }

        // Call the fillModal function when needed
        fillModal();

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>