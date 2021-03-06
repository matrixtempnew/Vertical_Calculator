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
      echo "";
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
    <style>
.form-inline {  
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.form-inline label {
  margin: 5px 10px 5px 0;
}

.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  /* background-color: #fff; */
  border: 1px solid #ddd;
}

.break {
  flex-basis: 100%;
  width: 0;
}


@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }
  
  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

@media
only screen and (max-width: 900px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
    display: block;
  }
  tr { border: 5px solid #ccc; margin-bottom : 10px; }
  td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 200px;
    margin-left: 150px;
    display: block;
  }
  td:before {
    position: absolute;
    top: 12px;
    left: 6px;
    width: 200px;
    padding-right: 40px;
    white-space: nowrap;
    margin-left: -150px;
    display: block;
  }
  td:nth-of-type(1):before { content: "Date1"; }
  td:nth-of-type(2):before { content: "Date2"; }
  td:nth-of-type(3):before { content: "Input1"; }
  td:nth-of-type(4):before { content: "Input2";}
  td:nth-of-type(5):before { content: "Input3"; }
  td:nth-of-type(6):before { content: "Input11"; }
  td:nth-of-type(7):before { content: "Input22"; }
  td:nth-of-type(8):before { content: "Input33";}
  td:nth-of-type(9):before { content: "Input Vertical1"; }
  td:nth-of-type(10):before { content: "Input Vertical2"; }
  td:nth-of-type(11):before { content: "Input Vertical3"; }
  td:nth-of-type(12):before { content: "Output Vertical1";}
  td:nth-of-type(13):before { content: "Output Vertical2"; }
  td:nth-of-type(14):before { content: "Output Vertical3"; }
  td:nth-of-type(15):before { content: "Diffrential Vertical1"; }
  td:nth-of-type(16):before { content: "Diffrential Vertical2";}
  td:nth-of-type(17):before { content: "Diffrential Vertical3";}

}

</style>
</head>
<body>
<br>
<div class="container">
<form class="form-inline" method="POST">
  <label for="date">Date1:</label>
  <input type="date" id="date" placeholder="" name="date1">
  <label for="input1">Input1:</label>
  <input type="number" id="input1" placeholder="" name="input1">
  <label for="input2">Input2:</label>
  <input type="number" id="input2" placeholder="" name="input2">
  <label for="input3">Input3:</label>
  <input type="number" id="input3" placeholder="" name="input3">
  <div class="break"></div>
  
  <label for="date">Date2:</label>
  <input type="date" id="date" placeholder="" name="date2">
  <label for="input11">Input11:</label>
  <input type="number" id="input11" placeholder="" name="input11">
  <label for="input22">Input22:</label>
  <input type="number" id="input22" placeholder="" name="input22">
  <label for="input33">Input33:</label>
  <input type="number" id="input33" placeholder="" name="input33">
  <br>
  <br>
  <input type="submit" name="submit" value ="Calculate" class="btn btn-primary">


</form>
</div>

<div class="table-responsive-sm  table-responsive-lg">
<table class="table table-bordered">
 <thead class="thead-dark">
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