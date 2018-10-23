<!DOCTYPE html>
<html>
<head>
<title>CreateGroup</title>
<link rel ="stylesheet" a href="css\creategroup.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
</head>
<body>
<div></div>


<?php
    session_start();
    if(!isset($_SESSION['email_id']))
  	header("Location:login.php");
    require_once('./mysqli_connect.php');



    $mail = $_SESSION['email_id'];
      $user="SELECT user_name FROM `users` WHERE email_id = '$mail' ";
       $r_user= mysqli_query($dbc,$user);
       $row_user=mysqli_fetch_array($r_user);
       $user_name = $row_user['user_name'];
       echo "$user_name";
?>
</body>
</html>