<?php
require_once 'DashboardClientModel.php';

session_start();

$dashboardclient_model = new DashboardClientModel();

$client = $_POST['user_client'];
echo "traducteru username ".$client;
   $dashboardclient_model->db_connect();
   $sql = "DELETE FROM `client` WHERE `user`='$client'";
   $dashboardclient_model->get_conn()->query($sql);
   $sql1 = "DELETE FROM `users` WHERE `username`='$client'";
   $dashboardclient_model->get_conn()->query($sql1);
    
   header("Location: ../DashboardClient.php");
  ?>
