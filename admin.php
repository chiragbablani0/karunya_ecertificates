<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "Zerois22", "test");
    if(! $connect ) {
      die('Could not connect: ' . mysql_error());
   }
    if(isset($_POST['username']) and isset($_POST['password']))
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        echo "hello";
        $query = "SELECT * FROM admin WHERE username='$username' and password='$pass'";
        echo "hello";
        echo $username;
        $result = mysqli_query($connect,$query) or die(mysql_error());
         echo "hello";
        $count = mysqli_num_rows($result);
        if ($count == 1){
            $_SESSION['username'] = $username;
            header('Location: import.php');
            echo "hello";
        }
        else
        {
            $msg = "Wrong credentials";
            echo $msg;
        }
    }

    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
 ?>
<form method="post" name="login">
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br>
        <button type="submit" name="login">Log in</button>
</form>