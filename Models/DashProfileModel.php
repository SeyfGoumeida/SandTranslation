<?php
require_once 'HomeModel.php';

session_start();

$home_model = new HomeModel();
$client = $_POST['user_client'];

$home_model->db_connect();
$sql = "SELECT * FROM `client` WHERE `username`='$client'";
$home_model->get_conn()->query($sql);


    header("Location: ../DashboardProfile.php");

}  ?>
