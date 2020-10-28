<?php
require_once 'Controlers/HomeControler.php';
$C = new HomeControler();
$C->Db_Connection();
$C->ShowPage();
?>