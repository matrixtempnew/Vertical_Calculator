<?php

include('connection.php');

if (isset($_POST['submit'])){

    $date = ($_POST['date']);
    $input1 = ($_POST['input1']);
    $input2 = ($_POST['input2']);
    $input3 = ($_POST['input3']);
    
    $input11 = mysqli_query($connection,"SELECT input1 FROM vertical_data ORDER BY input1 DESC LIMIT 1 ");

    while ($row = $input11->fetch_assoc()) {
      $input_1last = $row['input1'];
      }
    
    $input22 = mysqli_query($connection,"SELECT input2 FROM vertical_data ORDER BY input2 DESC LIMIT 1");
    while ($row = $input22->fetch_assoc()){
        $input_2last = $row['input2'];
    }
    
    $input33 = mysqli_query($connection,"SELECT input3 FROM vertical_data ORDER BY input3 DESC LIMIT 1");
    while ($row = $input33->fetch_assoc()){
        $input_3last = $row['input3'];
    }
    
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
    
    $checkdb = mysqli_query($connection,"SELECT * FROM vertical_data");
    $col = mysqli_num_rows($checkdb);
      
    if($col > 1){

    $input_v1 = ($input11 - $input1 ) / $input1 * 100;
    $input_v2 = ($input22 - $input2) / $input2 * 100;
    $input_v3 = ($input33 - $input3) / $input3 * 100;

    $output_v1 = ($input11-$input_1c) / $input_1c *100;
    $output_v2 = ($input22-$input_2c) / $input_2c *100;
    $output_v3 = ($input33-$input_3c) / $input_3c *100;

    $diff_v1 = ($input22 - $input11) * 100;
    $diff_v2 = ($input22 - $input33) * 100;
    $diff_v3 = ($diff_v1 - $diff_v2) * 100;
    }
    else{
        $input_v1 = 0;
        $input_v2 = 0;
        $input_v3 = 0;
        $output_v1 = 0;
        $output_v2 = 0;
        $output_v3 = 0;
        $diff_v1 = 0;
        $diff_v2 = 0;
        $diff_v3 = 0;

    }

    
    $sql = "INSERT INTO vertical_data (date,input1,input2,input3,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3) VALUES ('$date','$input1','$input2','$input3','$input_v1','$input_v2','$input_v3','$output_v1','$output_v2','$output_v3','$diff_v1','$diff_v2','$diff_v3')" ;


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
    <title>Vertical Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <br>
    <div class="container">
    <form class="form-inline" method="POST">
      <label for="date">Date:</label>
      <input type="date" id="date" placeholder="" name="date">
      <label for="input1">Input1:</label>
      <input type="text" id="input1" placeholder="" name="input1">
      <label for="input2">Input2:</label>
      <input type="text" id="input2" placeholder="" name="input2">
      <label for="input3">Input3:</label>
      <input type="text" id="input3" placeholder="" name="input3">
      <div class="break"></div>
      <input type="submit" name="submit" value ="Calculate" class="btn btn-primary">
    
    
</form>
    </div>
           
<?php
    
        $result = "SELECT date,input_v1,input_v2,input_v3,output_v1,output_v2,output_v3,diff_v1,diff_v2,diff_v3 FROM vertical_data";
    
        $query = mysqli_query($connection,$result);
    
    echo "<table> 
    <tr> 
          <th>Date</th>
          <th>Input Vertical1</th>
          <th>Input Verticle2</th>
          <th>Input Vertical3</th>
          <th>Output Vertical1</th>
          <th>Output Vertical2</th>
          <th>Output Vertical3</th>
          <th>Diffential Vertical1</th>
          <th>Diffential Vertical2</th>
          <th>Diffential Vertical3</th>
    </tr>"; 
    
    while($row = mysqli_fetch_array($query)) 
      { 
      echo "<tr>"; 
      echo "<td>" . $row['date'] . "</td>"; 
      echo "<td>" . $row['input_v1'] . "</td>"; 
      echo "<td>" . $row['input_v2'] . "</td>";
      echo "<td>" . $row['input_v3'] . "</td>";
      echo "<td>" . $row['output_v1'] . "</td>";
      if($row['output_v1']==10.00){
        echo "<td style = 'background-color :#00FF00;'>" .$row['output_v1'] ."</td>";
      }
      echo "<td>" . $row['output_v2'] . "</td>";
      echo "<td>" . $row['output_v3'] . "</td>";
      if($row['diff_v1']==500) {
             echo "<td style='background-color: #00FF00;'>".$row['diff_v1']."</td>";
            }
      echo "<td>" . $row['diff_v2'] . "</td>";
      echo "<td>" . $row['diff_v3'] . "</td>"; 
      echo "</tr>"; 
      } 
    echo "</table>";  
    
    ?>
      
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
</body>
</html>
