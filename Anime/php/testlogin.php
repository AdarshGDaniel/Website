<?php
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (!empty($username)){
    if (!empty($password)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "covid";
    $dbhandle = new mysqli ($host, $dbusername, $dbpassword, $dbname);


    $user = $_POST["username"];
    $pass =  $_POST["password"];


    $user = stripslashes($user);
    $pass = stripslashes($pass);

    $count = 0;
    $query =  array("SELECT * FROM users WHERE Username = '$user' and Password = '$pass' ");
    $count = count($query);

    if ($count == 1) {
        echo 'It worked';
    }
}
else{
  echo "Password should not be empty";
  die();
}
  }
  else{
    echo "username should not be empty";
    die();
  }

?>