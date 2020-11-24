<?php
session_start();
require_once './HomeModel.php';
$home_model = new HomeModel();
$home_model->db_connect();

$id_devis = $_POST['id_devis'];

$sql = "UPDATE `devis_traducteur`SET `traducteur_choisis`='1' WHERE`id`='$id_devis'";
$home_model->get_conn()->query($sql);
header("Location: ../Devis.php");