<?php  
$connect = mysqli_connect("localhost", "root", "Zerois22", "test");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $query = "INSERT into participants(name, regno) values('$item1','$item2')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
if(isset($_POST['submit_button']))
{
    mysqli_query($connect, 'TRUNCATE TABLE participants');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
if(isset($_POST['display_button'])){
$sql = mysqli_query($connect,"SELECT * FROM participants");
 if(! $sql ) {
      die('Could not get data: ' . mysql_error());
  }
  else
while($row = $sql->fetch_assoc()) {
    echo "<tr><br><td>".$row["regno"]."</td>  <td>".$row["name"]."</td><br></tr>";
  }
}

?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
  <form method="post" action="">
    <input name="submit_button" type="submit" value=" Truncate Table " />
    <form method="post" action="">
    <input name="display_button" type="submit" value=" Display users " />
</form>
 </body>  
</html>
