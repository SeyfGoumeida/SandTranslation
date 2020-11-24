<?php
require_once 'DashboardClientModel.php';

session_start();

$dashboardclient_model = new DashboardClientModel();

$client = $_POST['user_client'];

   $dashboardclient_model->db_connect();
   $sql = "SELECT * FROM `client` WHERE `user`='$client'";
   $result = $dashboardclient_model->get_conn()->query($sql);
   $row = $result->fetch_assoc();
   $username=$row['user'];
   $nom=$row['nom'];
   $prenom=$row['prenom'];
   $email=$row['email'];
   echo"username     ".$username;
   echo"nom    ".$nom;
   echo"prenom    ".$prenom;
   echo"email    ".$email;

   $sql = "INSERT INTO `blackliste`(`nom`, `prenom`, `username`, `email`) VALUES ('$nom', '$prenom', '$username','$email')";
   $dashboardclient_model->get_conn()->query($sql);

   $sql = "DELETE FROM `client` WHERE `user`='$client'";
   $dashboardclient_model->get_conn()->query($sql); 

   $sql1 = "DELETE FROM `users` WHERE `username`='$client'";
   $dashboardclient_model->get_conn()->query($sql1);
     
   header("Location: ../DashboardClient.php");
  ?>
