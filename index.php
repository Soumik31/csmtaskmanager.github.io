<!DOCTYPE html>

<html lang="en">
	<head>
    
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">			
		<meta name="viewport" content="width=device-width, initial-scale=1">		   
		<meta name="csrf-token" content="HmodUpT3Rmmfqssc9MKEuKy7nanhPAocHShWizsz">
		<meta name="HandheldFriendly" content="true">
		<title> Login </title>
		<link rel="icon" href="images/logo.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="js/main.js"></script>
		<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js"></script>
    
	</head>
    
<div class="loginbox">
		<img src="images/logo1.png" class="avatar">
        <h1>CSM Task Manager</h1>
		
		<?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>
 
 
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }			
        ?>
		
		
		<form action="process.php" method="POST">

            <p>Username</p>
            <input  type= "text" name="username" class="form-control" placeholder="Enter Username">
            <p>Password</p>
            <input  type= "password" name="password" class="form-control" placeholder="Enter Password">
            <input type="submit" name="Login" value="Login">

        </form>
		
</div>
	

</html>