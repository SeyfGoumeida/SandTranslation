<?php
require_once 'Controlers/DashboardProfileControler.php';
$client = $_POST['user_client'];
$traducteur = $_POST['user_traducteur'];
$C = new DashboardProfileControler($client,$traducteur);
$C->ShowPage();
?>