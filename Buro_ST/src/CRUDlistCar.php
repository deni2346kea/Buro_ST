<?php

require_once 'lib/DataSourceResult.php';
require_once 'lib/Kendo/Autoload.php';
require_once 'lib/Kendo/Data/DataSource.php';
require_once 'lib/Kendo/Data/DataSourceTransport.php';
require_once 'lib/Kendo/Data/DataSourceTransportCreate.php';
require_once 'lib/SchedulerDataSourceResult.php';
require_once 'lib/Kendo/Data/DataSourceTransportCreate.php';
require_once 'lib/Kendo/JavaScriptFunction.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('mysql:host=127.0.0.1;dbname=ST_db;charset=utf8', 'root', 'Denis');

    $type = $_GET['type'];

    $columns = array('idlistCar','location', 'make', 'model', 'avaStart', 'avaEnd', 'price');


    switch($type) {
        case 'create':
            $result = $result->create('listCar', $columns, $request->models, 'idlistCar');
            break;
        case 'read':
            $result = $result->read('listCar', $columns, $request);
            break;
        case 'update':
            $result = $result->update('listCar', $columns, $request->models, 'idlistCar');
            break;
        case 'destroy':
            $result = $result->destroy('listCar', $request->models, 'idlistCar');
            break;
    }

    echo json_encode($result,JSON_NUMERIC_CHECK);

    exit;
}

?>

