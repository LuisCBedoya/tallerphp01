<?php
require_once '../../src/response.php';
require_once '../../src/crud.php';
$params = json_decode(file_get_contents('php://input'), true);
$table2 = 'caso';
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
    $update = $crud->update_info($params['id'],$params,$table2);
    #$get2 = $crud->get_info($params,$table2);
    $get = $crud->get_ID($params['id_cliente'],$table);
    
    $response = array(
     'result' => 'Registro actualizado satisfactoriamente',
     'data' => [
        'id'=>$params['id'],
        'nombre_abogado'=>$params['nombre_abogado'],
        'email_abogado'=>$params['email_abogado'],
        'id_Cliente'=>$params['id_cliente'],
        'tipo_caso'=>$params['tipo_Caso'],
        'inicio_caso'=>$params['inicio_caso'],
        'cierre_caso'=>$params['cierre_caso'],
        'precio_caso'=>$params['precio_caso'],
        'numero_serie'=>$params['cierre_caso'],
        'data_fk'=>$get
     ]             
 );

    Response::result(200, $response);
}
