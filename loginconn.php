<?php
require_once __DIR__ . '/config.php';

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}
