<?php
$connect = mysqli_connect("localhost", "root", "Zerois22", "test");
if(! $connect ) {
      die('Could not connect: ' . mysql_error());
   }
$sql = mysqli_query($connect,"SELECT * FROM participants");
 if(! $sql ) {
      die('Could not get data: ' . mysql_error());
  }
   $NAMESS = [];
while($row = $sql->fetch_assoc()) {
    array_push($NAMESS,$row["regno"]);
  }

define('NAMES', $NAMESS);