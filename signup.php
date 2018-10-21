<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel ="stylesheet" a href="css\signup.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
</head>
<body>
    <div class="signup">
    <div class="alignsignup">
    <form method="POST" >
	Name:<br>
	<input type="text" name="name" size="30" value="" required/> <br><br>
	Email:<br>
	<input type="email" name="email_id" size="30" value="" required/> <br><br>
	Password:<br>
	<input type="Password" name="pass" size="30" value="" required/> <br><br>
	Confirm Password:<br>
	<input type="Password" name="cpass" size="30" value="" required/> <br><br>
	<input type="submit" class="btn btn-success " style="color:black; font-weight:bold; margin-left: 80px;"  name="submit" value="SignIn" />
</form>
    
<?php
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); 
  session_start();
  require_once('./mysqli_connect.php');
if(isset($_POST['submit'])){
	
    global $dbc;

    $data_missing = array();
     if(empty($_POST['name'])){
 
        // Adds name to array
        $data_missing[] = 'Name';
     }
    
    else {
 
        // Trim white space from the name and store the username
        $mail_id = trim(mysqli_real_escape_string($dbc,$_POST['name']));
 
    }
    if(empty($_POST['email_id'])){
 
        // Adds mail_id to array
        $data_missing[] = 'Email_ID';
     }
    
    else {
 
        // Trim white space from the email and store the mail id
        $mail_id = trim(mysqli_real_escape_string($dbc,$_POST['email_id']));
 
    }
 
    if(empty($_POST['pass'])){
 
        // Adds passowrd to array
        $data_missing[] = 'Password';

    }
    
    else {
 
        // Trim white space from the pass and store the pass
        $password = trim(mysqli_real_escape_string($dbc,$_POST['pass']));
 
    }
     if(empty($_POST['cpass'])){
 
        // Adds passowrd to array
        $data_missing[] = 'Confirm Password';

    }
    
    else {
 
        // Trim white space from the cpass and store the cpass
        $password = trim(mysqli_real_escape_string($dbc,$_POST['cpass']));
 
    }


    if(empty($data_missing)){
        
        require_once('./mysqli_connect.php');   

        global $dbc;
        $name =htmlspecialchars(mysqli_real_escape_string($dbc,$_POST['name']));
        $mail_id=htmlspecialchars(mysqli_real_escape_string($dbc,$_POST['email_id']));
        $pass=htmlspecialchars(mysqli_real_escape_string($dbc,$_POST['pass']));
        $cpass=htmlspecialchars(mysqli_real_escape_string($dbc,$_POST['cpass']));
        $user_query = "SELECT email_id FROM `users` WHERE email_id='$mail_id'";
        $user_result= mysqli_query($dbc,$user_query);
        $row= mysqli_fetch_array($user_result);
        $usere_id= $row['email_id'];
         
       if($pass != $cpass){

    	echo "<br>Oops!! password does not match";


         }

       else if($mail_id ==$usere_id){

         echo "<div class='main'><br>Email already exists";

       }


       else{

           $insert = "insert into users(user_name,email_id,password,posts) values('$name','$mail_id', '$pass','NULL')";
           $run = mysqli_query($dbc,$insert);
           echo "<div class='main' style='margin-left:60px;'> sign in success</div>";
           $_SESSION['email_id']=$mail_id;
           header("refresh:1; url=home.php");
           
            
        } 
     

       }

 

   
    else {
        
        
        
        foreach($data_missing as $missing){
            
            echo "<div class='main'><br><br><br><br> $missing  required <br /></div>";
            
           // header("refresh:2; url=login.php");
             		
        }
        
    }
  }  
  
?>
</div>
   </div>
</body>
</html>