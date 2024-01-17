<?php


$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "codingag-checkin";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}