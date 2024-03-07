<?php
require_once __DIR__ . '/../loader/autoloader.php';
$action = $_POST['action'];

switch($action){
    case  'getModels':
        extract($_POST);
        echo json_encode(CarModel::getCarModels($brand));
        break;

    case 'addCar':
        $data = $_POST;
        echo json_encode(CarModel::addCar($data));
        break;
}