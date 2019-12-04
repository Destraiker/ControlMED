<?php
include_once '../control/jwt_libs/core.php';
include_once '../control/jwt_libs/BeforeValidException.php';
include_once '../control/jwt_libs/ExpiredException.php';
include_once '../control/jwt_libs/SignatureInvalidException.php';
include_once '../control/jwt_libs/JWT.php';

use \Firebase\JWT\JWT;

// get posted data
$data = json_decode(file_get_contents("php://input"));

// get jwt
$jwt = isset($data->jwt) ? $data->jwt : "";

// if jwt is not empty
if ($jwt) {

    // if decode succeed, show user details
    try {
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));

        // set response code
        http_response_code(200);

        // show user details
        echo json_encode(array(
            "message" => "Acesso_concedido.",
            "data" => $decoded->data
        ));
    } catch (Exception $e) {

        // set response code
        http_response_code(401);

        // tell the user access denied  & show error message
        echo json_encode(array(
            "message" => "Acesso negado.",
            "error" => $e->getMessage()
        ));
    }
} else {

    // set response code
    http_response_code(401);

    // tell the user access denied
    echo json_encode(array("message" => "Acesso negado."));
}
