<?php
require_once 'Models/HomeModel.php';

class DevisModel
{
    private $home_model;

    public function get_devis() 

    {
        $this->home_model = new HomeModel();
        $username = $_SESSION['username'];
        $this->home_model->db_connect();
        $sql = "SELECT * FROM `traducteur` WHERE `user`='$username'";
        $result = $this->home_model->get_conn()->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $type = $row['type'];

        $_SESSION['id_traducteur'] = $id;
        $sql = "SELECT * FROM `devis` WHERE `type`='$type' and (`Lng_src` IN ( SELECT `language` FROM `lng_traducteur` WHERE `traducteur_id`='$id')and`Lng_dest` IN ( SELECT `language` FROM `lng_traducteur` WHERE `traducteur_id`='$id'))and ( `id` NOT IN( SELECT `id_devis` FROM `devis_traducteur` where `id_traducteur`='$id' ))";
        if ($result2 = $this->home_model->get_conn()->query($sql)) {return $result2;

        };

    }
    public function get_devis_client()
    {
        $this->home_model = new HomeModel();
        $username = $_SESSION['username'];
        $this->home_model->db_connect();

        $sql = "SELECT `dt`.`id`  , `d`.`type` ,`d`.`Lng_src`, `d`.`Lng_dest` , `t`.`nom` , `t`.`prenom`,`t`.`telephone`,`t`.`email` FROM `devis` as `d` JOIN `devis_traducteur` as `dt` ON `d`.`id`=`dt`.`id_devis` JOIN `traducteur` as `t` ON `dt`.`id_traducteur`=`t`.`id` WHERE `d`.`username`='$username' and `d`.`id`=`dt`.`id_devis`and `dt`.`traducteur_choisis`='0'";

        if ($result = $this->home_model->get_conn()->query($sql)) {return $result;};

    }

}