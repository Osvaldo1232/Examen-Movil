<?php
header('Access-Control-Allow-Origin: *');

$sql="SELECT f.nombre AS fabricante,
       p.nombre AS producto
FROM fabricante f
LEFT JOIN producto p ON f.id = p.id_fabricante
ORDER BY f.nombre ASC";
$preuser=array();
$preuser=null;
$conn=mysqli_connect("localhost","root","","tienda");
$pres=mysqli_query($conn,$sql);
while($pre=mysqli_fetch_array($pres))
{
    $preuser[]=$pre;
}
mysqli_close($conn);
echo json_encode($preuser);
?>