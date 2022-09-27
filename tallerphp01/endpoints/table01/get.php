<?php
require_once '../../src/response.php';
require_once '../../src/crud.php';
$table = 'cliente';
if ($_SERVER['REQUEST_METHOD'] != 'GET') {

     $response = array(
          'result' => 'error',
          'details' => 'Petición realizada de manera incorrecta!'
     );

     Response::result(400, $response);
     exit;
} else {
     $crud = new crud();
     $params = $_GET;
     $get = $crud->get_info($params,$table);

     $response = array(
          'result' => 'ok',
          'data' => $get
     );

     Response::result(200, $response);
}
