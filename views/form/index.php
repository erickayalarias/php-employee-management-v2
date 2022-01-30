<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant("URL");?>public/assets/css/register.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require "views/header.php";
    // print_r($this->mensaje["email"]);
    // print_r($this->mensaje["streetAddress"]);
    ?>
    <div class="wrapper rounded bg-white">
    <div class="h3">Registration Form</div>

 
    <div class="form">
        <form action=" <?php 
    if(isset($this->mensaje["id"])){
       echo constant("URL")."form/data/".$this->mensaje["id"];
    }else{
        echo constant("URL")."form/add";
    }
    ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input type="text" class="form-control p" name="name" required value="<?= isset($this->mensaje["name"]) ?  $this->mensaje["name"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input type="text" class="form-control p" name="lastName" required value="<?= isset($this->mensaje["lastName"]) ?  $this->mensaje["lastName"] : '' ?> "> </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> <input type="email" class="form-control" name="email" required  value="<?= isset($this->mensaje["email"]) ?  $this->mensaje["email"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
            <?php
            if(isset($this->mensaje["gender"])){
              if($this->mensaje["gender"] == "man"){
                    echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='gender' value='man' checked>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='gender' value='woman'>Female <span class='checkmark'></span> </label> </div>";
              } else if($this->mensaje["gender"] == "woman"){
                echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='gender' value='man'>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='gender' value='woman' checked>Female <span class='checkmark'></span> </label> </div>";
              }else{
                echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='gender' value='man'>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='gender' value='woman' >Female <span class='checkmark'></span> </label> </div>";
              }
            }else{
                echo "<div class='d-flex align-items-center mt-2'> <label class='option'> <input type='radio' name='gender' value='man'>Male <span class='checkmark'></span> </label> <label class='option ms-4'> <input type='radio' name='gender' value='woman' >Female <span class='checkmark'></span> </label> </div>";
            }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>City</label> <input type="text" class="form-control" name="city" required  value="<?= isset($this->mensaje["city"]) ?  $this->mensaje["city"] : '' ?> ">  </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Street Adress</label> <input type="tel" class="form-control" name="streetAddress" required  value="<?= isset($this->mensaje["streetAddress"]) ?  $this->mensaje["streetAddress"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>State</label> <input type="text" class="form-control" name="state" required value="<?= isset($this->mensaje["state"]) ?  $this->mensaje["state"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Age</label> <input type="tel" class="form-control" name="age" required value="<?= isset($this->mensaje["age"]) ?  $this->mensaje["age"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Postal Code</label> <input type="text" class="form-control" name="postalCode" required value="<?= isset($this->mensaje["postalCode"]) ?  $this->mensaje["postalCode"] : '' ?> "> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> <input type="tel" class="form-control"  name="phoneNumber" required value="<?= isset($this->mensaje["phoneNumber"]) ?  $this->mensaje["phoneNumber"] : '' ?> "> </div>
        </div>
        <!-- <div class="btn btn-primary mt-3" type="submit" name="submitForm">Submit</div> -->
        <button class="col-5 dflex btn btn-primary btn-lg" type="submit" name="submitForm"> Submit </button>
        <!-- <button id="boton"></button> -->
    </div>
</div>
</form>
    <?php 
    require "views/footer.php";
    ?>
</body>
</html>