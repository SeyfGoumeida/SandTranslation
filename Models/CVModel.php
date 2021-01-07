<?php
require_once 'DashboardDocumentModel.php';

session_start();

$dashboarddocument_model = new DashboardDocumentModel();

$username = $_POST['username'];
echo''.$username;
   $dashboarddocument_model->db_connect();


   $sql = "UPDATE `traducteur` SET `cv`='' WHERE `user`='$username'";
   $dashboarddocument_model->get_conn()->query($sql);

   
   header("Location: ../DashboardDocument.php");
  ?>
