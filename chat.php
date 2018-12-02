<!DOCTYPE html>


<html>
<head>
<title>Chat Room</title>
<link rel ="stylesheet" a href="css\chat.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>
<body style="background-color: #fffdf6;">
	<?php

if(!session_start())
{
  session_start();
}
if(!isset($_SESSION['email_id']))
  header("Location:login.php");
?>
<?php
include ("./func.php");
?>
 <nav class="navbar navbar-expand-sm navbar-fixed-top navbar-light mb-3" style="background-color:#155e63; position: fixed;">
        <div class="container"> 
            <a class="navbar-brand" href=<?php echo"allprofile.php?id=".$_SESSION['user_id'] ?> style="color:white;">Welcome <?php 
            require_once("./mysqli_connect.php");
    
            $mail_id=$_SESSION['email_id'];
            $u_nameq = "SELECT user_name FROM `users` where email_id='$mail_id'";
            $un_result= mysqli_query($dbc,$u_nameq);
            $rowu= mysqli_fetch_array($un_result);

              $user_name= $rowu['user_name'];
              echo $user_name;

              
          ?></a>


            <ul class="navbar-nav" >
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color:white;">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="userprofile.php" style="color:white;">Account</a>
                      
                    

                </li>
                <li class="nav-item" >
                
                
                 
                
               
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="logout.php" style="color:white;">
                   
                    Logout</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="help.html" style="color:white;">
                   
                    <i class="fas fa-info"></i></a>
                </li>
                
            </ul>

         </div>  
    </nav>
  
 <div id="content">

   <div id="usertimeline">

    <div id="groupdetails">
       <br>

 <div class="dropdown show" > 
       <H6> <a href="chat.php" style="color:#007bff;"> Direct Messages </a></H6>
 </div>
    
<br>
   
   <H6>
  
       <?php
          
        require_once("./mysqli_connect.php");  
        global $dbc;    
        $mail_id=$_SESSION['email_id'];
        $user_id =$_SESSION['user_id'];
        $u_name = "SELECT user_name,user_id FROM `users` where user_id !='20' and user_id !='$user_id' ";
        $un_result= mysqli_query($dbc,$u_name);
      

       while( $rowu= mysqli_fetch_array($un_result)){

           $user_name=$rowu['user_name'];
           $u_id = $rowu['user_id'];
       
        echo " <a style='color:white;' href='chat.php?id=$u_id' id=".$u_id." class='chat_details'> $user_name </a>";
    
        echo "<br><br>";

       }


       //chat

   
        
       ?>
      
 
       
  </H6>
    </div>
     
   </div>
 
      
 </div>


 <div class="clearfix" id='darea'>


    <?php
   require_once("./mysqli_connect.php");  
   global $dbc;

   echo "<div id = 'displayposts'>";
   
  if(isset($_GET['id'])){
     $user_id =$_GET['id'];
     echo"<div id= 'chatdis'>";
     echo"<form method='POST' id = 'post-form".$user_id."'>";
     echo"<textarea style='width:100%;'  id='content'name='content' placeholder='Type something.... :)'  rows='2' cols='100' required></textarea>";
     echo"<input type='submit' style='margin-top:-50px;float:right;margin-right:-75px;'class='btn btn-primary submit_post' id=". $user_id ."  name='pos' value='Send' /></form>";
     echo"</div>";
      
    }
     else{
    echo" <div id='index'>";

      
    

      echo "<img src='./chatdp.PNG'></img>
      </div>";
     }
    
     
    




echo "</div>"; 

?>


 </div>


    </div>
    </div>
     <script src="script.js"></script>
     <script src="pag.js"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>




</body>
</html>
