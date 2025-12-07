<?php
header('Access-Control-Allow-Origin: *');



$user =$_POST['usuario'];
$pd =$_POST['pred'];
$ps =$_POST['pres'];
$fe =$_POST['fecha'];
$ho =$_POST['hora'];

$sql = "UPDATE presiones SET presiond='$pd',  hora='$ho', presion='$ps' WHERE user='$user' and  fecha='$fe'";

$conn=mysqli_connect("localhost","root","","salud");
$res=mysqli_query($conn,$sql);

mysqli_close($conn);
echo json_encode($res);
?>