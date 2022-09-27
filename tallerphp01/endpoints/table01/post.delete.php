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
            'details' => 'Error en la solicitud'
        );

        Response::result(400, $response);
        exit;
    }
    $crud = new crud();
    $get = $crud->get_info($params,$table);
    $delete = $crud->delete_info($params['id'],$table);
    $response = array(
        'result' => 'Registro eliminado satisfactoriamente',
        'data' => $get
    );

    Response::result(404, $response);
}