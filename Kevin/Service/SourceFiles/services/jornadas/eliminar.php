<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/Jornada.php';

$database = new Database();
$db = $database->getConnection();

$jornada = new Jornada($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->usuario_id)) {
    $jornada->id = $data->id;
    $jornada->usuario_id = $data->usuario_id;

    if($jornada->eliminar()) {
        http_response_code(200);
        echo json_encode(array(
            "success" => true,
            "mensaje" => "Jornada eliminada exitosamente"
        ));
    } else {
        http_response_code(503);
        echo json_encode(array(
            "success" => false,
            "mensaje" => "No se pudo eliminar la jornada"
        ));
    }
} else {
    http_response_code(400);
    echo json_encode(array(
        "success" => false,
        "mensaje" => "Datos incompletos"
    ));
}
?>