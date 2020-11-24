<?php
require_once 'DashboardTraducteurModel.php';

session_start();

$dashboardtraducteur_model = new DashboardTraducteurModel();

$client = $_POST['user_client'];
echo "client username ".$client;
   $dashboardtraducteur_model->db_connect();
   $sql = "UPDATE `users` SET `bloque`=1 WHERE `username`='$client'";
   $dashboardtraducteur_model->get_conn()->query($sql);
  
   header("Location: ../DashboardClient.php");
  ?>
