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

if(!empty($data->email) && !empty($data->password)) {
    
    $usuario->email = $data->email;
    
    if($usuario->emailExiste()) {
        
        if($usuario->verificarPassword($data->password)) {
            http_response_code(200);
            echo json_encode(array(
                "success" => true,
                "mensaje" => "Login exitoso",
                "usuario" => array(
                    "id" => $usuario->id,
                    "nombre" => $usuario->nombre,
                    "email" => $usuario->email
                )
            ));
        } else {
            http_response_code(401);
            echo json_encode(array(
                "success" => false,
                "mensaje" => "Contraseña incorrecta"
            ));
        }
    } else {
        http_response_code(404);
        echo json_encode(array(
            "success" => false,
            "mensaje" => "Usuario no encontrado"
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