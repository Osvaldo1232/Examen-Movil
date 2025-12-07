<?php
header('Access-Control-Allow-Origin: *');

$user = $_GET['id'];

$sql = "DELETE FROM jornada WHERE id='$user'";

$conn = mysqli_connect("localhost", "root", "", "empresa_db");
$pres = mysqli_query($conn, $sql);

mysqli_close($conn);
echo json_encode($pres);
?>
