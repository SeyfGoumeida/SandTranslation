<?php
require_once '../Models/AdminModel.php';
require_once '../Views/AdminView.php';

$admin_model = new AdminModel();
$admin_model->db_connect();
$conn = $admin_model->get_conn();

$username = $_POST['email'];
$psw = $_POST['psw'];

$sql = "SELECT * FROM `users` WHERE `username`='$username' and `pwd`='$psw' and `admin`='1'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$admin_model->Session($row['username'], $row['psw']);
header("Location: ../Dashboard.php");