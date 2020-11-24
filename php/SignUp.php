<?php

require_once '../Models/HomeModel.php';
require_once '../Views/HomeView.php';

$home_model = new HomeModel();
$home_model->db_connect();
$conn = $home_model->get_conn();

$username = $_POST['username'];
$email = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$psw = $_POST['psw'];
$phone = $_POST['phone'];
$adresse = $_POST['adresse'];
$wilaya = $_POST['wilaya'];
$commune = $_POST['commune'];




$sql1 = "INSERT INTO `users`(`username`,`email`, `pwd`, `traducteur`, `admin`, `bloque`) VALUES ('$username','$email','$psw',0,0,0)";

$sql2 = "INSERT INTO `client`(`nom`, `prenom`, `email`, `adresse`, `telephone`, `user`, `wilaya`, `commune`) VALUES ('$nom','$prenom','$email','$adresse','$phone','$username','$wilaya','$commune')";
echo"avant ";
if (($conn->query($sql1)) and ($conn->query($sql2))) {
    echo"apres ";
    $home_model->db_disconnect();
    $home_model->Session(0,$username,$email,$nom,$prenom,$psw,$phone,$adresse,$commune,$wilaya,"","","","","","","");
    header("Location: ../index.php");

};
?>