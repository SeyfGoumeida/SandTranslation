<?php
require_once 'DashboardTraducteurModel.php';

session_start();

$dashboardtraducteur_model = new DashboardTraducteurModel();

$traducteur = $_POST['user_traducteur'];
echo "traducteru username ".$traducteur;
   $dashboardtraducteur_model->db_connect();
   $sql = "DELETE FROM `traducteur` WHERE `user`='$traducteur'";
   $dashboardtraducteur_model->get_conn()->query($sql);
   $sql1 = "DELETE FROM `users` WHERE `username`='$traducteur'";
   $dashboardtraducteur_model->get_conn()->query($sql1);
    
   header("Location: ../DashboardTraducteur.php");
  ?>
