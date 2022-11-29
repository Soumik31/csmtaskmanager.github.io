<?php
        session_start();
        if(!isset($_SESSION['user']));
		$usr = 	$_SESSION['user'];
?>

<?php

			$con = mysqli_connect("127.0.0.1","root","");
				 if(!$con){
					   die("Database Connection failed".mysql_error());
			}else{
			$db_select = mysqli_select_db($con, "csm_task_creater");
				 if(!$db_select){
					   die("Database selection failed".mysql_error());
			}
			else{ 

			    } 
			}
			
			
			$q = " SELECT * FROM task WHERE stat = 'Pending'";	
			$records = mysqli_query($con, $q);
			
			$off = 4*60*60;
			$now = time()+$off;
			$date = date('YmdHi',$now);
			

			
			$sql = ("SELECT COUNT(*) FROM `task` WHERE stat = 'Pending'");
			$rs = mysqli_query($con, $sql);
			$result = mysqli_fetch_array($rs);		

			
?>
		
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">			
	<meta name="viewport" content="width=device-width, initial-scale=1">		   
	<meta name="csrf-token" content="HmodUpT3Rmmfqssc9MKEuKy7nanhPAocHShWizsz">
	<meta name="HandheldFriendly" content="true">
	
	<link rel="stylesheet" type="text/css" href="css/back.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
 
	<link rel="icon" href="images/logo.png">
  	
	
</head>
	<header>
		
		<nav class="navbar navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="home.php"> Welcome to CSM SOC Task Manager </a>
			</div>
			<a href="index.php" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
		</nav>
		
	</header>	
	
	<body>
		
		<div class="d-flex justify-content-center">
		  <a href="form.php" class="btn btn-secondary center-block" role="'button">Create Task</a>

		  <div class="btn-group" role="group">
			<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Search Task
			</button>
				<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				  <a class="dropdown-item" href="searchdate.php" >Search by Date</a>
				  <a class="dropdown-item" href="searchname.php">Search by Name</a>
				</div>
		  </div>
		</div>
		
	<form method='post'>	
	<!--<div class="container">-->
			<h3 class="text-white">Pending Task<span class="badge badge-pill badge-info"><?php echo $result[0]; ?></span></h3>
			<table id="editable_table" class="table table-bordered table-hover">
				<thead class="thead-dark text-sm-center">	
					<tr>
						<th>Task ID</th>
						<th>ST</th>
						<th>Task Name</th>
						<th>Pending Time</th>
						<th>Escalation Group</th>
						<th>Escalation Time</th>
						<th>Mail Reference</th>
						<th>Task Update</th>
						<th>Status</th>
					<!--<th>ET</th>-->
						<th>Severity</th>
						<th>User</th>
					<!--<th>Last Editor</th>-->
						<th></th>
					</tr>		
				</thead>	
				<tbody class="table-primary">
					<?php

							while ($task = mysqli_fetch_assoc($records)){
								$gt = $task['task_ID'];
								$st = strtotime($task['task_ID']);
								$today = time();
								$diff = $today - $st;
								$pendingD = (int) ($diff/86400);
								$pendingH = (int) (($diff%86400)/3600);
								$pendingM = (int) ((($diff%86400)%3600)/60);
       
								$total_pending = ($pendingD . "d " . $pendingH . "h " . $pendingM . "m");
								
   
								if ($task['uuser'])
									{
										$editor = ($task['uuser']);
									}
									else
									{
										$editor = ($task['user']);
									}
									
							$prev_history = htmlspecialchars_decode($task['history']);		
					?>		
							<tr class="text-center header">
							<td> 
								<?php echo $task['task_ID'];  ?> 
								<span class="fa fa-plus"></span>
							</td>
							<td> <?php echo $task['ST'];  ?> </td>
							<td> <?php echo $task['task_name'];  ?> </td>        
							<td> <?php echo $total_pending; ?> </td>
							<td> <?php echo $task['esc_grp'];  ?> </td>
							<td> <?php echo $task['esc_time'];  ?> </td>       
							<td> <?php echo $task['mail_ref'];  ?> </td>
							<td> <?php echo $task['updt'];  ?> </td>
							<td> <?php echo $task['stat'];  ?> </td>
						  <!-- <td> < ?php echo $task['end_t'];  ?> </td> -->
							<td> <?php echo $task['severity'];  ?> </td>
							<td> <?php echo $editor ?> </td>
						  <!--<td> < ?php echo $task['user'];  ?> </td>
						   <td> < ?php echo $task['uuser'];  ?> </td>  -->
							<td contenteditable="false">
							<a href="action.php?edit=<?php echo $task['task_ID']; ?>" 
							class="btn btn-info" >Edit</a>
							</td>
							</tr>
							
							<tr style="display: none">
								<th colspan="1" class="text-sm-center"> History </th>
								<td colspan="11"> <p> <?php echo $prev_history; ?> </p> </td>
							</tr>
					<?php		 	 
						 }		 
					?>
				</tbody>	
			</table>
	<!--</div>-->
		
	</form>	
	
	<script>
		 $('.header').click(function(){
			$(this).nextUntil('tr.header').slideToggle(500);
		});
	</script>
		
	</body>


</html>
