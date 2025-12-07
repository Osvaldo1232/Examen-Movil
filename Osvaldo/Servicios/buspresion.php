<?php
header('Access-Control-Allow-Origin: *');

$user = $_GET['usuario'];
$fecha = $_GET['fecha'];

$sql = "DELETE FROM presiones WHERE user='$user' AND fecha='$fecha'";

$conn = mysqli_connect("localhost", "root", "", "salud");
$pres = mysqli_query($conn, $sql);

mysqli_close($conn);
echo json_encode($pres);
?>
