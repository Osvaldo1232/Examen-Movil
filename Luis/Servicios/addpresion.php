<?php
header('Access-Control-Allow-Origin: *');
/*
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type:application/json");*/


$user =$_POST['usuario'];
$pd =$_POST['pred'];
$ps =$_POST['pres'];
$fe =$_POST['fecha'];
$ho =$_POST['hora'];



$sql="insert into presiones (user, presiond, presion, fecha, hora) values('$user', '$pd', '$ps','$fe', '$ho') ";

$conn=mysqli_connect("localhost","root","","salud");
$res=mysqli_query($conn,$sql);

mysqli_close($conn);
echo json_encode($res);
?>