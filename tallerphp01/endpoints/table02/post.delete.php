<?php
require_once '../../src/response.php';
require_once '../../src/crud.php';
$params = json_decode(file_get_contents('php://input'), true);
$table = 'caso';
$table2 = 'cliente';
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
    $get = $crud->get_ID($params['id_cliente'],$table2);
    $delete = $crud->delete_info($params['id'],$table);
    $response = array(
     'result' => 'Registro eliminado satisfactoriamente',
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
    Response::result(404, $response);
}