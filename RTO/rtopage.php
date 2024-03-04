<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>RTO | Database</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
    <style>
        label{
            margin:5px 0px;
        }
        input{
            margin-bottom:10px;
        }
        .container{
            margin-top:50px;
        }
        input[type="submit"]{
            background-color:lightgreen !important;
            width: 100px;
            height: 50px;
            margin-left:550px;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="./rtopage.php" method="POST">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center"> Add Vehicle</h3>
                        <?php
                        include '../dbconnect.php';

                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $Name=$_POST['name'];
                            $Name=strtoupper($Name);
                            $phno=$_POST['phno'];
                            $email=$_POST['email'];
                            $regno=$_POST['regno'];
                            $regno=strtoupper($regno);
                            $rfidno=$_POST['rfidno'];
                            $rfidno=strtoupper($rfidno);
                            $vehiclewheel=$_POST['vehiclewheel']; 
                            $vehiclemodel=$_POST['vehiclemodel'];
                            $vehiclemodel=strtoupper($vehiclemodel);
                            $address=$_POST['address'];
                            $tankcapacity=$_POST['tankcapacity'];
                            $fueltype=$_POST['fueltype'];
                        
                            $sql="INSERT INTO registration (Name,Phone,Email,Reg_no,RFID_no,Vehicle_type,Model,Address,Tank_capacity,Fuel_used) VALUES ('$Name','$phno','$email','$regno','$rfidno','$vehiclewheel','$vehiclemodel','$address','$tankcapacity','$fueltype')";
        
                        if ($conn->query($sql) === TRUE) {
                            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Record Added</strong> Vehicle Added Successfully!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>');
                        } else {
                            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Record Failed to create</strong> Something went wrong. 
                            Or Vehicle is already in use
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>');
                        }}
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" required class="form-control" id="name" placeholder="Enter name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phno">Phone Number</label>
                                    <input required type="number" class="form-control" id="phno" placeholder="Enter Phone number" name="phno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required type="text" class="form-control" id="email" 
                                    name="email" placeholder="Enter Email">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="regno">Vehicle Register number</label>
                                    <input type="text" required class="form-control" id="regno" placeholder="Enter vehicle REG number" name="regno">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rfidno">Vehicle RFID number</label>
                                    <input type="text" required class="form-control" id="rfidno" placeholder="Enter vehicle RFID number" name="rfidno">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehiclewheel">Vehicle</label>
                                   <select name="vehiclewheel" id="vehiclewheel">
                                    <option value="Two Wheeler">Two Wheeler</option>
                                    <option value="Four Wheeler">Four Wheeler</option>
                                   </select>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehiclemodel">Vehicle Model</label>
                                    <input type="text" required class="form-control" name ="vehiclemodel" id="vehiclemodel" placeholder="Enter vehicle Model">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="50" rows="3" required placeholder=" Enter Address"></textarea>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tankcapacity">Fuel Tank Capacity</label>
                                    <input type="number" class="form-control" id="tankcapacity" required placeholder="Enter Fuel Tank Capacity" name="tankcapacity">
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                <label for="fueltype">Fuel Type</label>
                                   <select required name="fueltype" id="fueltype">
                                    <option value="Petrol">Petrol</optio>
                                    <option value="Diesel">Diesel</option>
                                   </select>
                                </div>
                        </div>
                        </div>
                        <div>
                            <input type="submit" value="ADD">
                        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>