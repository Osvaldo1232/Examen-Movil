<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->nombre) &&
    !empty($data->email) &&
    !empty($data->password)
) {
    $usuario->email = $data->email;
    
    // Verificar si el email ya existe
    if($usuario->emailExiste()) {
        http_response_code(400);
        echo json_encode(array(
            "success" => false,
            "mensaje" => "El email ya está registrado"
        ));
    } else {
        $usuario->nombre = $data->nombre;
        $usuario->password = $data->password;
        
        if($usuario->registrar()) {
            http_response_code(201);
            echo json_encode(array(
                "success" => true,
                "mensaje" => "Usuario registrado exitosamente"
            ));
        } else {
            http_response_code(503);
            echo json_encode(array(
                "success" => false,
                "mensaje" => "No se pudo registrar el usuario"
            ));
        }
    }
} else {
    http_response_code(400);
    echo json_encode(array(
        "success" => false,
        "mensaje" => "Datos incompletos"
    ));
}
?>