<?php
header('Content-type: text/html; charset=utf-8');
ini_set("display_errors", "on");
error_reporting(E_ALL);

require_once("functions.php");
require_once("controller.class.php");

$controller = new controller();
$controller->run();
