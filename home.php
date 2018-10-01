<!DOCTYPE html>

<?php

include ("./func.php"); 


?>
<html>
<head>
<title>Home</title>
<link rel ="stylesheet" a href="css\home.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

</head>
<body>
<div class="vl">

<?php
session_start();
?>

<br/>

    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome <?php 
            require_once("./mysqli_connect.php");
    
            $mail_id=$_SESSION['email_id'];
            $u_nameq = "SELECT user_name FROM `users` where email_id='$mail_id'";
            $un_result= mysqli_query($dbc,$u_nameq);
            $rowu= mysqli_fetch_array($un_result);
            $user_name= $rowu['user_name'];
            echo $user_name;
           
            
            
            
            
            
            ?></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                   
                    Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                   
                    Logout</a>
                </li>
                
            </ul>
            </div>
    </nav>

    <div class="container ">
    <form method="POST">
    
    <fieldset class="div1">
    <label for="exampleTextarea"> It's time to post</label>
    <br>
    <textarea  id="content"name="content"  rows="4" cols="50"></textarea>
    <br>
    <input type="submit" style="margin-left:320px" class="btn btn-primary"  name="pos" value="Post" />
    
    </fieldset>
    
    
    </form>

  <?php
  // insertpost();

  if(isset($_POST['pos'])){
        
    require_once("./mysqli_connect.php");
    
    $content =$_POST['content'];
    $mail_id=$_SESSION['email_id'];
    $user_query = "SELECT user_id FROM `users` WHERE email_id='$mail_id'";
  
    $user_result= mysqli_query($dbc,$user_query);
    $row= mysqli_fetch_array($user_result);
    $user_id= $row['user_id'];
    

    $insert = "insert into posts(user_id, post_content, post_timestamp) values('$user_id','$content', NOW())";
 
    $run = mysqli_query($dbc,$insert);

    if($run){


      // echo "posted to timeline";
       $update = "update users set posts='yes' where user_id='$user_id'";
       $r_update=mysqli_query($dbc,$update);
      
    }

   }
 ?>
  
    <div class="posts" style="padding-left:25%;">

        <h5>RECENT</h5>
        <?php

        // getpost();

        require_once('./mysqli_connect.php');
        global $dbc;
       $g_posts = "SELECT * FROM `posts` ORDER by post_id DESC";
       $r_posts =  mysqli_query($dbc,$g_posts);
       while($row_posts=mysqli_fetch_array($r_posts)){
    
         $post_id = $row_posts['post_id'];
         $user_id = $row_posts['user_id'];
         $content = $row_posts['post_content'];
         $post_tstamp = $row_posts['post_timestamp'];
       
    
      //fetch user details regarding the posts
    
       $user="SELECT * FROM `users` WHERE user_id='$user_id' AND posts='yes' ";
       $r_user= mysqli_query($dbc,$user);
       $row_user=mysqli_fetch_array($r_user);
       $user_name = $row_user['user_name'];
    
       //display posts
      
       echo "
       <p> ---------------------------------------</p>
       <div id= 'posts' style='float:left;' >
        
       <H6><a href='user_profile.php? user_id=$user_id'>$user_name</a></H6>
       </div>
       <p style='margin-left:100px;'>$post_tstamp</p>
       <p>$content</p>
       <a href='reply.php?post_id=$post_id'>
          Reply </a>
       <p> ---------------------------------------</p>
       
          ";
       }
        ?>


    </div>
    </div>
</body>
</html>