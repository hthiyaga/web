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
<div class="formdiv">
	<div class="align">
    <form method ="post">
    <a href=home.php <i class="fas fa-chevron-left" ></i></a>
	<H4 style="text-align: center;"> Create group </H4>
	Name:<br>
	<input type="text" id="text" name="gname" size="50"placeholder="Name of the group" required /><br><br>
	<input type="radio" name="privacy" value="public" checked/>Public
	<input type="radio" name="privacy" value="private"/>Private<br><br>
	Users list:<br>
	<input type="text" id="text"name="list" placeholder="Enter users list"/><br><br>
	<input type="submit" name="submit" value="create" class="btn btn-success" style="float:right"/>
    </form>
    </div>


   <!-- create group -->

   <?php
  	session_start();
	if(!isset($_SESSION['email_id']))
  	header("Location:login.php");

    require_once('./mysqli_connect.php');
    if(isset($_POST['submit'])){
    	global $dbc;
    	$data_missing = array();
     	if(empty($_POST['gname'])){
 
        // Adds name to array
        $data_missing[] = 'Name';
     	}
     	else{
     		$gname = trim(mysqli_real_escape_string($dbc,$_POST['gname']));
     	}

     	if($_POST['privacy'])
     	{

     		$privacy=$_POST['privacy'];
     	}
     	else{

     		$privacy= $_POST['privacy'];
     	}

     	if(empty($_POST['list'])){
         
         }
        else{

        	$list=trim(mysqli_real_escape_string($dbc,$_POST['list(varname)']));
        }

       
        // insert into groups

        $insert = "insert into groups(group_name,privacy) values('$gname','$privacy')";
        $run = mysqli_query($dbc,$insert);
        echo "created '$gname' successfully";
         //fetch user_id 

        $mail_id=$_SESSION['email_id'];
        $u_id = "SELECT user_id FROM `users` where email_id='$mail_id'";
        $un_result= mysqli_query($dbc,$u_id);
        $rowu= mysqli_fetch_array($un_result);
        $user_id= $rowu['user_id'];

        //fetch group_id
        $g_id = "SELECT group_id FROM `groups` where group_name='$gname'";
        $gn_result=mysqli_query($dbc,$g_id);
        $rowg= mysqli_fetch_array($gn_result);
        $group_id=$rowg['group_id'];

        //insert into user_groups
        
        $insert = "insert into user_groups(user_id,group_id) values('$user_id','$group_id')";
        $run = mysqli_query($dbc,$insert);

    }

?>


 </div>

</body>
</html>