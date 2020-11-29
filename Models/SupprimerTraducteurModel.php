<?php
require_once 'DashboardTraducteurModel.php';

session_start();

$dashboardtraducteur_model = new DashboardTraducteurModel();

$traducteur = $_POST['user_traducteur'];

   $dashboardtraducteur_model->db_connect();

   $sql = "SELECT * FROM `traducteur` WHERE `user`='$traducteur'";
   $result = $dashboardtraducteur_model->get_conn()->query($sql);
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
   $dashboardtraducteur_model->get_conn()->query($sql);

   $sql = "DELETE FROM `traducteur` WHERE `user`='$traducteur'";
   $dashboardtraducteur_model->get_conn()->query($sql);
   $sql1 = "DELETE FROM `users` WHERE `username`='$traducteur'";
   $dashboardtraducteur_model->get_conn()->query($sql1);
    
   header("Location: ../DashboardTraducteur.php");
  ?>
