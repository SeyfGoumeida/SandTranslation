<?php
require_once 'HomeModel.php';

session_start();

$home_model = new HomeModel();
$username = $_SESSION['username'];

$traducteur = $_POST['user_traducteur'];
$new_rating = $_POST['rating'];

$home_model->db_connect();
$sql = "SELECT `dt`.`id` FROM `devis` as `d` JOIN `devis_traducteur` as `dt` ON `d`.`id`=`dt`.`id_devis` JOIN `traducteur` as `t` ON `dt`.`id_traducteur`=`t`.`id` WHERE `t`.`user`='$traducteur'and `d`.`username`='$username' and `dt`.`done`='1'";
$result = $home_model->get_conn()->query($sql);
$row = $result->fetch_assoc();

if ($row['id'] != "") {

    $sql1 = "SELECT `note` FROM `traducteur`WHERE `user`='$traducteur'";
    $result = $home_model->get_conn()->query($sql1);
    $row = $result->fetch_assoc();
    $note = $row['note'];
    $note = ($note + $new_rating) / 2;
    $sql1 = "UPDATE `traducteur` SET `note`='$note' WHERE `user`='$traducteur'";
    $result = $home_model->get_conn()->query($sql1);
    header("Location: ../ListeTraducteur.php");
} else {echo 'NON NOTER ';
    header("Location: ../ListeTraducteur.php");
    ?>
    <script>
    function myFunction() {
    alert("I am an alert box!");
    }
    </script>
    <?php } ?>