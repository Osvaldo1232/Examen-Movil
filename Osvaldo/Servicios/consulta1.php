<?php
header('Access-Control-Allow-Origin: *');

$sql="SELECT p.nombre AS producto,
       p.precio,
       f.nombre AS fabricante
FROM producto p
JOIN fabricante f ON p.id_fabricante = f.id
WHERE p.precio >= 180
ORDER BY p.precio DESC, p.nombre ASC";
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