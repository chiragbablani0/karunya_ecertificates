<?php
require_once 'participants.php';

// Check whether the name submitted is in the array of names.
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
    if(strtolower($_POST['name']==$row['regno']))
    {
    	$name = $row['name'];
	require_once 'certificate.php';
    }
  }
if (in_array(strtolower($_POST['name']), NAMES)) {
	
} else {
	header('Location: index.php?error=name-not-found');
}