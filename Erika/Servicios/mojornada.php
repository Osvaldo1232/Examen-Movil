<?php
header('Access-Control-Allow-Origin: *');


$user =$_POST['user'];
$dia_trabajo =$_POST['dia_trabajo'];
$trabajado =$_POST['trabajado'];
$precio =$_POST['precio'];
$total =$_POST['total'];


$sql = "UPDATE jornada SET trabajado='$trabajado',  precio='$precio', total='$total' WHERE user='$user' and  dia_trabajo='$dia_trabajo'";

$conn=mysqli_connect("localhost","root","","empresa_db");
$res=mysqli_query($conn,$sql);


mysqli_close($conn);
echo json_encode($res);
?>