<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "crime3");

if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$admin_name = $_REQUEST['admin_name'];
$admin_pass = $_REQUEST['admin_pass'];
$admin_id = $_REQUEST['admin_id'];
$sql = "UPDATE admin set admin_name='".$admin_name."'where admin_id = '".$admin_id."'";
$sql2= "UPDATE admin set admin_pass='".$admin_pass."'where admin_id = '".$admin_id."'";
if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
    header("Location:/Project3/login/login2.php");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}
mysqli_close($conn);
?>
