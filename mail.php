<?php

	
		
	require 'C:\wamp\www\PHPMailer-master\PHPMailerAutoload.php';
	ini_set('max_execution_time', 300); //Timeout duration in sec
	ini_set('memory_limit', '1024M'); // Total ram allocation
	date_default_timezone_set("Asia/Dhaka");// Timezone declaration		
	
	$off = 6*60*60;
	$now = time();
	$old = time()-$off;
	
	$offs = 7*24*60*60;
	$long = time()-$offs;
	
	$startdate = date('YmdHi',$now);
	$lastdate = date('YmdHi',$old);
	$longpend = date('YmdHi',$long);
	
	$now_date = date('Y-m-d', $now);
	// $now_time = date('H:i', $now);
	// $now_date_time = $now_date . " " . $now_time;	
	// $now_minus_5 = $now - 600 ;  // minus 10 mins
	// $now_minus_5_date = date('Y-m-d', $now_minus_5);
	// $now_minus_5_time = date('H:i', $now_minus_5);
	// $now_minus_5_date_time = $now_minus_5_date . "T" . $now_minus_5_time;		
						
	$query = "SELECT COUNT(*) FROM `task` WHERE task_ID <= $longpend AND stat = 'Pending'";		
	$query2 = "SELECT COUNT(*) FROM `task` WHERE task_ID BETWEEN '$lastdate' AND '$startdate' ";	
	$query3 = "SELECT COUNT(*) FROM `task` WHERE stat = 'Pending'";	
	$query4 = "SELECT task_name, mail_ref, history, severity FROM task WHERE stat = 'Pending'";;	
	
	$con=mysqli_connect('10.16.36.173','!s3M_D6','Gr44M33nPh0n3') or die('Not Connected');

	mysqli_select_db($con,'csm_task_creater') or die('No Database Found'); //task is database name
							
	$rs1 = mysqli_query($con, $query);
	$result1 = mysqli_fetch_array($rs1);
	$rs2 = mysqli_query($con, $query2);
	$result2 = mysqli_fetch_array($rs2);	
	$rs3 = mysqli_query($con, $query3);
	$result3 = mysqli_fetch_array($rs3);

	$rs4 = mysqli_query($con, $query4);
	while($row= mysqli_fetch_assoc($rs4)) {						
		$data[] = $row;
	}
	
	$data_postpaid = "<style>			
		body {
			font-family: Cambria;
			font-size: 13;				
		}
		table {	
			border-collapse: collapse;    
			margin-left:5%; 
			margin-right:5%;		
		}
		td {
			text-align: center;
			padding-left: 12px;
			padding-right: 12px;
			padding-top: 2px;
			padding-bottom: 2px;
		}
		</style>";
	$data_postpaid .= "<body> Hi,<br/><br/>Please check the pending tasks from CSM Task Manager. <br/><br/>";
	$data_postpaid .= "<font color=\"blue\"><b><u>Long Pending Tasks: </b></u></font>";
	$data_postpaid .= " $result1[0] (More than last 7 days)<br/><br/>";
	$data_postpaid .= "<font color=\"blue\"><b><u>New Created Tasks: </b></u></font>";
	$data_postpaid .= " $result2[0] (Last 6 hours)<br/><br/>";
	$data_postpaid .= "<font color=\"blue\"><b><u>Total Pending Tasks: </b></u></font>";
	$data_postpaid .= " $result3[0] <br/><br/>";
	$data_postpaid .=  "<table border=\"1\"><tr><th>Task Name</th><th>Mail Reference</th><th>Update</th><th>Severity</th></tr>";	


		foreach ($data as $k=>$v) {
			$data_postpaid .= "<tr>";
			foreach ($v as $key=>$value) {
				$data_postpaid .= "<td>" . $value . "</td>";
			}
		$data_postpaid .= "</tr>";
	}
	
	$data_postpaid .= "</table><br/><br/><br/>This is an auto-generated mail.For any problem please contact Soumik.<br/><br/></body>";
	
	echo  $data_postpaid;
	mail_group($data_postpaid, $now_date);
				


function mail_group($body, $now_date){			
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                 // Set mailer to use SMTP
	$mail->Host = '192.168.207.211';
	$mail->FromName = 'CSM TASK MANAGER';// Mailer name is ISEM System
	$mail->From = 'noReply@csm.com';// mail from ISEM	
	$mail->isHTML(true);  	
	$mail->addAddress("CSM_SOC@grameenphone.com");
	//$mail->addAddress("soumik.shadman@grameenphone.com");
	//$mail->addCC("vmo@grameenphone.com");
	$mail->Subject = "CSM Pending Tasks [". $now_date . "]";// Give the mail a subject
	$mail->Body = $body;	
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent<br/>';
	}
}

?>