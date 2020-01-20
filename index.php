<?php

include('connection.php');

if (isset($_POST['submit'])){

    $date1 = real_escape_string($connection,$_POST['date1']);
    $date2 = real_escape_string($connection,$_POST['date2']);
    $input1 = real_escape_string($connection,$_POST['input1']);
    $input2 = real_escape_string($connection,$_POST['input2']);
    $input3 = real_escape_string($connection,$_POST['input3']);
    $input11 = real_escape_string($connection,$_POST['input11']);
    $input22 = real_escape_string($connection,$_POST['input22']);
    $input33 = real_escape_string($connection,$_POST['input33']);

    $input_v1 = [($input11 - $input1 ) / $input1] * 100;
    $input_v2 = [($input22 - $input2) / $input2] * 100;
    $input_v3 = [($input33 - $input3) / $input3] * 100;

    $output_v1 = [($input11-$input1) / $input1] *100;
    $output_v2 = [($input22-$input2) / $input2] *100;
    $output_v3 = [($input33-$input3) / $input3] *100;

    $diff_v1 = ($input2 - $input1) * 100;
    $diff_v2 = ($input2 - $input3) * 100;
    $diff_v3 = ($diff_v1 - $diff_v2) * 100;


    $sql = "INSERT INTO vertical_data (date1,date2,input1,input2,input3,input11,input22,input33,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3) VALUES ('$date1','$date2','$input1','$input2','$input3','$input11','$input22','$input33','$input_v1','$input_v2','$input_v3','$output_v1','$output_v2','$output_v3','$diff_v1','$diff_v2','$diff_v3')" ;



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vertical Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
   <strong> Vertical Calculator<strong>
</div>

<div class="container">

<form method="POST">


<div class="row">
    <div class="col">
      Date1
    </div>
    <div class="col">
      Input1
    </div>
    <div class="col">
      Input2
    </div>
    <div class="col">
      Input3
    </div>
  </div>

  <div class="row">
  <div class="col">
    <input type="date" name="date1" id="date1">
  </div>
    <div class="col">
      <input type="number" name="input1" id="input1">
    </div>
    <div class="col">
    <input type="number" name="input2" id="input2">
    </div>
    <div class="col">
    <input type="number" name="input3" id="input3">
    </div>
  </div>

  <div class="row">
  <div class="col">
    Date2
    </div>
    <div class="col">
      Input11
    </div>
    <div class="col">
      Input22
    </div>
    <div class="col">
      Input33
    </div>
  </div>

  <div class="row">
  <div class="col">
  <input type="date" name="date2" id="date">
  
  </div>
    <div class="col">
      <input type="number" name="input11" id="input11">
    </div>
    <div class="col">
    <input type="number" name="input22" id="input22">
    </div>
    <div class="col">
    <input type="number" name="input33" id="input33">
    </div>
  </div>
<br> <br>
<input type="submit" class="btn btn-primary" name="submit" value = "Calculate">


</div>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>