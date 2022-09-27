
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
    $update = $crud->update_info($params['id'],$params,$table);
    $get = $crud->get_info($params,$table);
    $response = array(
        'result' => 'Registro actualizado satisfactoriamente',
        'data' => $get
    );

    Response::result(200, $response);
}
