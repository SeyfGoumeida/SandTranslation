<?php
require_once 'Controlers/DashboardDocumentControler.php';

if (isset($_POST['document']) )$document = $_POST['document'];
if (!isset($_POST['document']) )$document=0;

$C = new DashboardDocumentControler($document);
$C->ShowPage();
?>