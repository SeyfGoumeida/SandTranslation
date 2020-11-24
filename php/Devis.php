<?php

require_once '../Models/HomeModel.php';
require_once '../Views/HomeView.php';

$home_model = new HomeModel();
$home_model->db_connect();
$conn = $home_model->get_conn();
$nom = $_POST['name'];
$prenom = $_POST['lastname'];
$username = $_SESSION['username'];
$telephone = $_POST['phone'];
$language_src = $_POST['Lng_src'];
$language_dest = $_POST['Lng_dest'];
$email = $_POST['email'];
$adresse = $_POST['adr'];
$type = $_POST['type'];
$commentaire = $_POST['Comnt'];
$fichier = $_POST['Fichier'];
if (isset($_POST['Assermante'])) {
    
    $assermante = '1';
} else {

    $assermante = '0';
}

$sql1 = "INSERT INTO `devis`(`username`,`nom`,`prenom`,`email`,`telephone`,`adresse`,`type`,`commentaire`,`fichier`,`assermante`,`Lng_src`,`Lng_dest`) VALUES ('$username','$nom','$prenom','$email','$telephone','$adresse','$type','$commentaire','$fichier','$assermante','$language_dest','$language_src')";

$home_model->get_conn()->query($sql1);
$home_model->db_disconnect();

header("Location: ../index.php");