<?php
header('Access-Control-Allow-Origin: *');
$user=$_GET['user'];
$pass=$_GET['pass'];
$sql="select * from usuarios where user='$user' and password='$pass'";
$preuser=array();
$preuser=null;
$conn=mysqli_connect("localhost", "root", "","salud");
$pres=mysqli_query($conn,$sql);
if($pre=mysqli_fetch_array($pres))
{
    $preuser[]=$pre;
}
mysqli_close($conn);
echo json_encode($preuser);
?>