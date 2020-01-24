<?php

include('connection.php');

if (isset($_POST['submit'])){

    $date1 = ($_POST['date1']);
    $date2 = ($_POST['date2']);
    $input1 = ($_POST['input1']);
    $input2 = ($_POST['input2']);
    $input3 = ($_POST['input3']);
    $input11 = ($_POST['input11']);
    $input22 = ($_POST['input22']);
    $input33 = ($_POST['input33']);

    
    $input_1 = mysqli_query($connection,"SELECT input1 FROM vertical_data LIMIT 1 ");

    while ($row = $input_1->fetch_assoc()) {
      $input_1c = $row['input1'];
      }
    
    $input_2 = mysqli_query($connection,"SELECT input2 FROM vertical_data LIMIT 1 ");
    while ($row = $input_2->fetch_assoc()) {
      $input_2c = $row['input2'];
      }
    

    $input_3 = mysqli_query($connection,"SELECT input3 FROM vertical_data LIMIT 1 ");

    while ($row = $input_3->fetch_assoc()) {
      $input_3c = $row['input3'];
      }
    

    $input_v1 = ($input11 - $input1 ) / $input1 * 100;
    $input_v2 = ($input22 - $input2) / $input2 * 100;
    $input_v3 = ($input33 - $input3) / $input3 * 100;

    $output_v1 = ($input11-$input_1c) / $input_1c *100;
    $output_v2 = ($input22-$input_2c) / $input_2c *100;
    $output_v3 = ($input33-$input_3c) / $input_3c *100;

    $diff_v1 = ($input22 - $input11) * 100;
    $diff_v2 = ($input22 - $input33) * 100;
    $diff_v3 = ($diff_v1 - $diff_v2) * 100;


    $sql = "INSERT INTO vertical_data (date1,date2,input1,input2,input3,input11,input22,input33,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3) VALUES ('$date1','$date2','$input1','$input2','$input3','$input11','$input22','$input33','$input_v1','$input_v2','$input_v3','$output_v1','$output_v2','$output_v3','$diff_v1','$diff_v2','$diff_v3')" ;


    if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

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
<input type="button" class="btn btn-primary" value="Show Data">


</div>
</form>

<br>
<br>
<div class="table-responsive">
<table class="table">
 <thead>
    <tr>
      <th scope="col">Date 1</th>
      <th scope="col">Date 2</th>
      <th scope="col">Input 1</th>
      <th scope="col">Input 2</th>
      <th scope="col">Input 3</th>
      <th scope="col">Input 11</th>
      <th scope="col">Input 22</th>
      <th scope="col">Input 33</th>
      <th scope="col">Input Vertical1</th>
      <th scope="col">Input Verticle2</th>
      <th scope="col">Input Vertical3</th>
      <th scope="col">Output Vertical1</th>
      <th scope="col">Output Vertical2</th>
      <th scope="col">Output Vertical3</th>
      <th scope="col">Diffential Vertical1</th>
      <th scope="col">Diffential Vertical2</th>
      <th scope="col">Diffential Vertical3</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

        // $query = "SELECT * FROM vertical_data";
        // $query= mysqli_query($connection,"SELECT date1,date2,input1,input2,input3,input11,input22,input33,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3 FROM vertical_data");

        if ($result = mysqli_query($connection,"SELECT date1,date2,input1,input2,input3,input11,input22,input33,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3 FROM vertical_data")) {
 
          while ($row = $result->fetch_assoc()) {
            $date1 = $row['date1'];
            $date2 = $row['date2'];
            $input1 = $row['input1'];
            $input2 = $row['input2'];
            $input3 = $row['input3'];
            $input11 = $row['input11'];
            $input22 = $row['input22'];
            $input33 = $row['input33'];
            $input_v1 = $row['input_v1'];
            $input_v2 = $row['input_v2'];
            $input_v3 = $row['input_v3'];
            $output_v1 = $row['output_v1'];
            $output_v2 = $row['output_v2'];
            $output_v3 = $row['output_v3'];
            $diff_v1 = $row['diff_v1'];
            $diff_v2 = $row['diff_v2'];
            $diff_v3 = $row['diff_v3'];


            echo '<tr> 
                  <td>'.$date1.'</td> 
                  <td>'.$date2.'</td> 
                  <td>'.$input1.'</td> 
                  <td>'.$input2.'</td> 
                  <td>'.$input3.'</td>
                  <td>'.$input11.'</td>
                  <td>'.$input22.'</td>
                  <td>'.$input33.'</td>
                  <td>'.$input_v1.'</td>
                  <td>'.$input_v2.'</td>
                  <td>'.$input_v3.'</td>
                  <td>'.$output_v1.'</td>
                  <td>'.$output_v2.'</td>
                  <td>'.$output_v3.'</td>
                  <td>'.$diff_v1.'</td>
                  <td>'.$diff_v2.'</td>
                  <td>'.$diff_v3.'</td> 
              </tr>';
    }
    $result->free();
} 

      ?>

   
  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>