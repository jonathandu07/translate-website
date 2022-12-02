<?php
header('Content-Type: application/json');
require_once "./functions.php";

$active = array();
$active["success"] = true;
$active['lang'] = get_langue();
// $retour = array();
// $retour["success"] = true;
// $retour["message"] = "Tout est bon";
// $retour["results"] ["vols"] = array("Paris-Toulouse", "Lyon-Paris");
// $retour["retour"]["test"] ="Salut";

// echo json_encode($retour);

echo json_encode($active);