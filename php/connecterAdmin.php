<?php
require_once '../Models/AdminModel.php';
require_once '../Views/AdminView.php';

$admin_model = new AdminModel();
$admin_model->db_connect();
$conn = $admin_model->get_conn();

$email = $_POST['email'];
$psw = $_POST['psw'];

$sql = "SELECT * FROM `users` WHERE `email`='$email' and `pwd`='$psw' and `admin`='1'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$USR = $row['username'];

if ($row['email'] == $email and $row['pwd'] == $psw) {

    if ($row['traducteur'] == 0) {

        $sql2 = "SELECT * FROM `client` WHERE `user`='$USR'";

        $result1 = $conn->query($sql2);
        $row1 = $result1->fetch_assoc();

        $admin_model->Session($row['traducteur'], $row['username'], $row['email'], $row1['nom'], $row1['prenom'], $row['pwd'], $row1['telephone'], $row1['adresse'], $row1['commune'], $row1['wilaya'], "", "", "", "", "", "", "");
        header("Location: ../Dashboard.php");
    }
    ;

    if ($row['traducteur'] == 1) {$sql2 = "SELECT * FROM `traducteur` WHERE `user`='$USR'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $admin_model->Session($row['traducteur'], $row2['user'], $row2['email'], $row2['nom'], $row2['prenom'], $row['pwd'], $row2['telephone'], $row2['adresse'], $row2['commune'], $row2['wilaya'], $row2['fax'], $row2['ref1'], $row2['ref2'], $row2['ref3'], $row2['asser_justif'], $row2['cv'], $row2['type']);
        header("Location: ../Dashboard.php");
    }
;

    $admin_model->db_disconnect();

    header("Location: ../Dashboard.php");
} else {
    header("Location: ../Dashboard.php");
    return 'erreur de connection ';
}