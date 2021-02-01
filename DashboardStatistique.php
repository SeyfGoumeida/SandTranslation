<?php
require_once 'Controlers/DashboardStatistiqueControler.php';
$C = new DashboardStatistiqueControler();
$id_traducteur;
$id_client;
$avant;
$apres;

if (isset($_POST['avant']) )$avant = $_POST['avant'];
if (!isset($_POST['avant']) )$avant=0;

if (isset($_POST['apres']) )$apres = $_POST['apres'];
if (!isset($_POST['apres']) )$apres=0;

if (isset($_POST['devistraducteur']) )$id_traducteur = $_POST['devistraducteur'];
if (!isset($_POST['devistraducteur']) )$id_traducteur=0;

if (isset($_POST['devisclient']) )$id_client = $_POST['devisclient'];
if (!isset($_POST['devisclient']) )$id_client=0;

$C->ShowPage($id_traducteur,$id_client,$apres,$avant);
?>