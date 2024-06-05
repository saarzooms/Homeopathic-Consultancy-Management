<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeopathic Consultancy Management</title>
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
    </style>
</head>
<body style="background-color: #0b6e4f;">

    <div class="container d-flex justify-content-center">
        <div class="bg-white mx-5 w-50 rounded-3 text-align-center mt-5 p-3 fs-6" style="min-width: 100%;">

            <div class="input-group mt-3 mb-2">
                <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" style="border-top-left-radius:8px;border-bottom-left-radius:8px;background-color: #0b6e4f;color: bisque;">Date</span>
                <input type="text" id="date" class="form-control border-0 right-align" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Date" style="background-color: #d1d3ab;">
            </div>

            <div class="table-responsive">
                <table class="table table-striped p-3">
                    <thead>
                        <tr>
                            <th scope="col">Medicine</th>
                            <th scope="col">Dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Medicine 1</td>
                            <td>Dose 1</td>
                        </tr>
                        <tr>
                            <td>Medicine 1</td>
                            <td>Dose 1</td>
                        </tr>
                        <tr>
                            <td>Medicine 1</td>
                            <td>Dose 1</td>
                        </tr>
                        <tr>
                            <td>Medicine 1</td>
                            <td>Dose 1</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="justify-content-center align-items-center mb-1 p-3 rounded-3 input-group-text-right" style="background-color: #d1d3ab; color: black !important;">
                <span>Amount Previously Left to be paid:</span> <b>₹400.00</b>
            </div>

            <div class="input-group mt-3">
                <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" style="background-color: #0b6e4f; color: bisque;">To be paid</span>
                <input type="number" class="form-control border-0 right-align" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="background-color: #d1d3ab;" placeholder="Enter Here  ">
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text fixed-width p-3 border-0" id="inputGroup-sizing-default" style="background-color: #0b6e4f; color: bisque;">Amount paid</span>
                <input type="number" class="form-control border-0 right-align" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" style="background-color: #d1d3ab;" placeholder="Enter Here  ">
            </div>

            <div class="justify-content-center align-items-center mb-1 p-3 rounded-3 mt-3 input-group-text-right" style="background-color: #d1d3ab; color: black !important;">
                <span>Amount that will be left to be paid:</span> <b>₹400.00</b>
            </div>

            <button class="rounded-3 p-3 mt-3 border-0 w-100" style="background-color: #1da453; color: white; font-weight: 500;">SAVE <i class="fa-solid fa-check"></i></button>

        </div>
    </div>
    <script>
      $(document).ready(function () {
        var currentDate = new Date();
        var formattedDate = ('0' + (currentDate.getMonth()+1) ).slice(-2) + '/'
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
