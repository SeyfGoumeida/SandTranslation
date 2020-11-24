<?php
require_once 'DashboardTraducteurModel.php';

session_start();

$dashboardtraducteur_model = new DashboardTraducteurModel();

$traducteur = $_POST['user_traducteur'];
echo "traducteru username ".$traducteur;
   $dashboardtraducteur_model->db_connect();
   $sql = "UPDATE `users` SET `bloque`=1 WHERE `username`='$traducteur'";
   $dashboardtraducteur_model->get_conn()->query($sql);
  
   header("Location: ../DashboardTraducteur.php");
  ?>
