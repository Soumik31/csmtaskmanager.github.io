<?php
// mail.php - Auto email report for pending tasks
// Requires PHPMailer. Update SMTP settings before use.

require_once __DIR__ . '/conn.php';

ini_set('max_execution_time', 300);
ini_set('memory_limit', '1024M');
date_default_timezone_set("UTC");

$off     = 6 * 60 * 60;
$now     = time();
$old     = $now - $off;
$long    = $now - (7 * 24 * 60 * 60);

$startdate = date('YmdHi', $now);
$lastdate  = date('YmdHi', $old);
$longpend  = date('YmdHi', $long);
$now_date  = date('Y-m-d', $now);

$rs1     = mysqli_query($con, "SELECT COUNT(*) FROM `task` WHERE task_ID <= '$longpend' AND stat = 'Pending'");
$result1 = mysqli_fetch_array($rs1);

$rs2     = mysqli_query($con, "SELECT COUNT(*) FROM `task` WHERE task_ID BETWEEN '$lastdate' AND '$startdate'");
$result2 = mysqli_fetch_array($rs2);

$rs3     = mysqli_query($con, "SELECT COUNT(*) FROM `task` WHERE stat = 'Pending'");
$result3 = mysqli_fetch_array($rs3);

$rs4 = mysqli_query($con, "SELECT task_name, mail_ref, history, severity FROM task WHERE stat = 'Pending'");
$data = [];
while ($row = mysqli_fetch_assoc($rs4)) {
    $data[] = $row;
}

$body  = "<style>body{font-family:Cambria;font-size:13px;}table{border-collapse:collapse;margin:0 5%;}td{text-align:center;padding:2px 12px;}</style>";
$body .= "<body>Hi,<br/><br/>Please check the pending tasks from CSM Task Manager.<br/><br/>";
$body .= "<font color='blue'><b><u>Long Pending Tasks:</u></b></font> {$result1[0]} (More than last 7 days)<br/><br/>";
$body .= "<font color='blue'><b><u>New Created Tasks:</u></b></font> {$result2[0]} (Last 6 hours)<br/><br/>";
$body .= "<font color='blue'><b><u>Total Pending Tasks:</u></b></font> {$result3[0]}<br/><br/>";
$body .= "<table border='1'><tr><th>Task Name</th><th>Mail Reference</th><th>Update</th><th>Severity</th></tr>";

foreach ($data as $row) {
    $body .= "<tr><td>{$row['task_name']}</td><td>{$row['mail_ref']}</td><td>{$row['history']}</td><td>{$row['severity']}</td></tr>";
}
$body .= "</table><br/><br/>This is an auto-generated mail.</body>";

echo $body;

// To enable email sending, install PHPMailer via Composer:
// composer require phpmailer/phpmailer
// Then uncomment and configure the block below:

/*
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host       = 'your.smtp.host';
$mail->SMTPAuth   = true;
$mail->Username   = 'your@email.com';
$mail->Password   = 'yourpassword';
$mail->FromName   = 'CSM Task Manager';
$mail->From       = 'noreply@yourdomain.com';
$mail->isHTML(true);
$mail->addAddress('recipient@yourdomain.com');
$mail->Subject    = "CSM Pending Tasks [{$now_date}]";
$mail->Body       = $body;
$mail->send();
*/
