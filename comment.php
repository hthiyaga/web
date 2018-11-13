


<?php
session_start();
require_once("./mysqli_connect.php");
global $dbc;
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); 



 if (isset($_POST['reply'])){
 	
 	  $data =  $_POST['reply'];
    $user_id = $_SESSION['user_id'];
    $post_id = $data['post_id'];
    $comment = htmlspecialchars(mysqli_real_escape_string($dbc,$data['comment']));



 
  
 $insert = "INSERT INTO comments (post_id,user_id,comment,comment_timestamp)VALUES ('$post_id','$user_id','$comment',NOW())";

                $run = mysqli_query($dbc,$insert);
                echo "inserted";
               if($run){

               	$update = "update users set comments='yes' where user_id='$user_id'";
       		    $r_update=mysqli_query($dbc,$update);
               }
               else{

               	echo "fail".$insert;
               }
        

           

       }

 if (isset($_POST['join'])){
     $data =  $_POST['join'];

    
    $group_name = $data['group_name'];
    $user_id = $data['user_id'];
    $seuser_id = $_SESSION['user_id'];

    $sql= "SELECT group_id FROM groups WHERE group_name='$group_name'";
    $run=mysqli_query($dbc,$sql);
    $result=mysqli_fetch_array($run);
    $group_id=$result['group_id'];

          if(!empty($user_id))
                {

                   foreach ($user_id as $ulist)
                 {
                         $userfetch = "SELECT group_id from user_groups where user_id='$ulist' and group_id ='$group_id'";
                         $runfetch = mysqli_query($dbc,$userfetch);
                         $result = mysqli_fetch_array($runfetch);
                         $dupuser = $result['group_id'];
                         
                     
                         if($group_id == $dupuser)
                         {


                         }
                         else{


                          $userinsert = "INSERT into user_groups(user_id,group_id) values ('$ulist', '$group_id')";
                          $rin=mysqli_query($dbc,$userinsert);
                         }


                  } 
                }

          else{

          $insert="INSERT INTO user_groups(user_id,group_id) VALUES('$user_id','$group_id')";
          $r=mysqli_query($dbc,$insert);
          if($r){

           echo "success";
            }
    
          else{

           echo "fail".$insert;
             }

          }


  

 }


  if(isset($_POST['pos'])){
           $data =  $_POST['pos'];
           $user_id = $_SESSION['user_id'];
           $group_id= $data['group_id'];
           $content =htmlspecialchars(mysqli_real_escape_string($dbc,$data['content']));
           $mail_id= $_SESSION['email_id'];
       if(empty($content)){

       }
       else{
            $user_query = "SELECT user_id FROM `users` WHERE email_id='$mail_id'";
            $user_result= mysqli_query($dbc,$user_query);
            $row= mysqli_fetch_array($user_result);
            $user_id= $row['user_id'];
    

            $insert = "insert into posts(user_id, post_content, post_timestamp,  group_id) values('$user_id','$content', NOW(),'$group_id')";
 
           $run = mysqli_query($dbc,$insert);

          if($run){
          // echo "posted to timeline";
          $update = "update users set posts='yes' where user_id='$user_id'";
          $r_update=mysqli_query($dbc,$update);

         }

          $g_posts = "SELECT * FROM posts INNER JOIN users JOIN archive_info WHERE posts.group_id='$group_id' and users.user_id=posts.user_id and users.posts = 'yes' and posts.post_content = '$content' and posts.post_timestamp = NOW() and archive_info.group_id = posts.group_id ORDER BY posts.post_id DESC";
          $r_posts =  mysqli_query($dbc,$g_posts);

          if($r_posts->num_rows>0){
             while($row_posts=mysqli_fetch_assoc($r_posts)){ 
            $pos['messages'][] = $row_posts;

        }

         echo json_encode($pos);
          }

       }


    }

   if(isset($_GET['group_messages'])){

          $group_id =  $_GET['group_messages'];
          $user_id = $_SESSION['user_id'];
          //$group_id= $data['group_id'];
      $g_posts = "SELECT * FROM posts INNER JOIN users JOIN archive_info WHERE posts.group_id='$group_id' and users.user_id=posts.user_id and users.posts = 'yes' and archive_info.group_id = posts.group_id ORDER BY posts.post_id DESC";
          $r_posts =  mysqli_query($dbc,$g_posts);

          if($r_posts->num_rows>0){
             while($row_posts=mysqli_fetch_assoc($r_posts)){ 
            $groupMessages['messages'][] = $row_posts;
             }  
          }else{

           $groupMessages['messages'] = "noposts";
        }
        echo json_encode($groupMessages);

    }

  if(isset($_POST['userLiked'])){ 
     
     $post_id = $_POST['userLiked'];
     $mail_id=$_SESSION['email_id'];
     $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
        AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($dbc, $sql);
  if (mysqli_num_rows($result) > 0) {


    echo "1";
  }else{


    echo "0";
  }

  }

    if(isset($_POST['userDisliked'])){ 
     
     $post_id = $_POST['userDisliked'];
     $mail_id=$_SESSION['email_id'];
     $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
        AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($dbc, $sql);
  if (mysqli_num_rows($result) > 0) {


    echo "1";
  }else{


    echo "0";
  }

  }


  if(isset($_POST['getLikes'])){ 

    $post_id = $_POST['getLikes'];
     
   $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $post_id AND rating_action='like'";
  $rs = mysqli_query($dbc, $sql);
  $result = mysqli_fetch_array($rs);
  echo $result[0];
  }

  if(isset($_POST['getDislikes'])){ 

    $post_id = $_POST['getDislikes'];
     
    $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $post_id AND rating_action='dislike'";
  $rs = mysqli_query($dbc, $sql);
  $result = mysqli_fetch_array($rs);
  echo $result[0];
  }

    if(isset($_POST['getcomment'])){ 

        $post_id = $_POST['getcomment'];
         
       $r_comments = "SELECT * FROM `comments` INNER JOIN users WHERE comments.post_id='$post_id'and comments.user_id = users.user_id and comments='yes'";
       $re_comments =  mysqli_query($dbc,$r_comments);
       if($re_comments->num_rows>0){ 
        while($row_comments=mysqli_fetch_assoc($re_comments)){ 

            $getcomment['messages'][] = $row_comments;
       }

       echo json_encode($getcomment);
  }

}



if(isset($_GET['getnames'])){ 


    $getname= "SELECT user_name from users";
    $result =  mysqli_query($dbc,$getname);
     if($result->num_rows>0){ 

      while($row_names = mysqli_fetch_assoc($result)){

        $getnames['names'][]= $row_names;
      }

      echo json_encode($getnames);

     }
   }


   if(isset($_POST['admin'])){ 

    $user_id = $_SESSION['user_id'];
    

      echo $user_id;

     
   }



   if(isset($_POST['del'])){ 

   
    

      $post_id =  $_POST['del'];


      $del= "DELETE from posts where post_id ='$post_id' ";
      $result =  mysqli_query($dbc,$del);
      echo "success";

     
   }

 ?>