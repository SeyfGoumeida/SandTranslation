<?php
require_once 'Models/HomeModel.php';
class TraductionModel
{
    private $home_model;

    public function get_traduction()
    {
        $this->home_model = new HomeModel();
        $username = $_SESSION['username'];
        $this->home_model->db_connect();
        $sql = "SELECT `dt`.`id`,`d`.`nom`, `d`.`prenom` ,`d`.`Lng_src`, `d`.`Lng_dest` , `d`.`telephone` , `d`.`email`,`d`.`adresse` ,`d`.`username` ,`d`.`commentaire` FROM `devis` as `d` JOIN `devis_traducteur` as `dt` ON `d`.`id`=`dt`.`id_devis` JOIN `traducteur` as `t` ON `dt`.`id_traducteur`=`t`.`id` WHERE `t`.`user`='$username' and `d`.`id`=`dt`.`id_devis`and `dt`.`traducteur_choisis`='1' and `dt`.`done`='0'";

        if ($result = $this->home_model->get_conn()->query($sql)) {return $result;};

    }

}