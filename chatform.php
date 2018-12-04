<?php 



session_start();
require_once("./mysqli_connect.php");
global $dbc;
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); 


    if(isset($_POST['chat'])){
         $data =  $_POST['chat'];
         $user_id = $_SESSION['user_id'];
         $cuser_id = $data['cuser_id'];
        $content =htmlspecialchars(mysqli_real_escape_string($dbc,$data['content']));

      
      


        
   
        $insert = "insert into chats(user_id, chat_content, chat_timestamp, chat_user_id) values('$user_id','$content', NOW(),$cuser_id"."$user_id)";
     
        $run = mysqli_query($dbc,$insert);

   
        if($run){
   
   
           echo "chat posted";
           $update = "update users set chat='yes' where user_id='$user_id'";
           $r_update=mysqli_query($dbc,$update);
          
        }

        else{

          echo"failed";
        }
   
       }

?>