<?php
require_once('app/config/database.php');
require_once('app/controllers/StudentsController.php');
require_once('app/controllers/HocPhanController.php');

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'StudentsController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra xem controller có tồn tại không
$controllerPath = "app/controllers/$controllerName.php";
if (!file_exists($controllerPath)) {
    die("Lỗi: Controller không tồn tại - $controllerName");
}

require_once $controllerPath;

// Kiểm tra xem class có tồn tại không
if (!class_exists($controllerName)) {
    die("Lỗi: Class không tồn tại - $controllerName");
}

$controllerInstance = new $controllerName();

// Kiểm tra xem action có tồn tại không
if (!method_exists($controllerInstance, $action)) {
    die("Lỗi: Action không tồn tại - $action");
}

$controllerInstance->$action();
?>