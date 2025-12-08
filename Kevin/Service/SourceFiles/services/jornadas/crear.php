<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/Jornada.php';

$database = new Database();
$db = $database->getConnection();

$jornada = new Jornada($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->usuario_id) &&
    !empty($data->nombre_empleado) &&
    !empty($data->horas) &&
    !empty($data->turno)
) {
    $jornada->usuario_id = $data->usuario_id;
    $jornada->nombre_empleado = $data->nombre_empleado;
    $jornada->horas = $data->horas;
    $jornada->turno = $data->turno;
    $jornada->es_festivo = isset($data->es_festivo) ? $data->es_festivo : false;

    $jornada->calcularPago();

    if($jornada->crear()) {
        http_response_code(201);
        echo json_encode(array(
            "success" => true,
            "mensaje" => "Jornada registrada exitosamente",
            "datos" => array(
                "nombre_empleado" => $jornada->nombre_empleado,
                "horas" => $jornada->horas,
                "turno" => $jornada->turno,
                "es_festivo" => $jornada->es_festivo,
                "tarifa_base" => $jornada->tarifa_base,
                "tarifa_final" => $jornada->tarifa_final,
                "pago_total" => round($jornada->pago_total, 2)
            )
        ));
    } else {
        http_response_code(503);
        echo json_encode(array(
            "success" => false,
            "mensaje" => "No se pudo registrar la jornada"
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