<?php
$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

require_once "controllers/{$controller}Controller.php";

$class = ucfirst($controller) . 'Controller';
$instance = new $class();
$instance->$action();