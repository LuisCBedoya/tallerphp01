<?php
require_once '../../src/response.php';
require_once '../../src/crud.php';
$params = json_decode(file_get_contents('php://input'), true);
$table = 'cliente';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    
    $response = array(
        'result' => 'error',
        'details' => 'Petición realizada de manera incorrecta!'
    );

    Response::result(400, $response);
    exit;

} else {
    if (!isset($params)) {
        $response = array(
            'result' => 'error',
            'details' => 'No envio Ningun parametro'
        );

        Response::result(400, $response);
        exit;
    }
    $crud = new crud();
    $insert = $crud->insert_info($params,$table);
    $response = array(
        'result' => 'ok',
        'insert' => $insert
    );
    Response::result(201, $response);
}
