<?php
header('Access-Control-Allow-Origin: *');

$user =$_GET['usuario'];
$sql="SELECT * FROM presiones WHERE user='$user'";
$preuser=array();
$preuser=null;
$conn=mysqli_connect("localhost","root","","salud");
$pres=mysqli_query($conn,$sql);
while($pre=mysqli_fetch_array($pres))
{
    $preuser[]=$pre;
}
mysqli_close($conn);
echo json_encode($preuser);
?>