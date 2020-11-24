<?php
session_start();
require_once './HomeModel.php';
$home_model = new HomeModel();
$home_model->db_connect();
$id_devis = $_POST['id_devis'];
$id_traducteur = $_SESSION['id_traducteur'];

$sql = "INSERT INTO `devis_traducteur`(`id_devis`, `id_traducteur`) VALUES ('$id_devis','$id_traducteur')";
$home_model->get_conn()->query($sql);
header("Location: ../Devis.php");