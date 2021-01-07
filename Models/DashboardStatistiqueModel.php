<?php
class DashboardStatistiqueModel
{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tdw";
    private $conn;
    private $result;
    private $email;
    private $psw;
    private $nom;
    private $prenom;
    private $wilaya;
    private $commune;
    private $phone;
    private $fax;
    private $adresse;
  

    public function db_connect()
    {

        //DataBase connection

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function db_disconnect()
    {
        $this->conn->close();
    }



    public function get_conn()
    {
        return $this->conn;
    }
    public function get_devis()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `devis`as `d` LEFT JOiN `devis_traducteur` as `dt` on `d`.`id`=`dt`.`id_devis` WHERE `d`.`id` NOT IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 )";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }
    public function get_traduction()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `devis`as `d` LEFT JOiN `devis_traducteur` as `dt` on `d`.`id`=`dt`.`id_devis` WHERE `d`.`id` IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 )";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }
    public function get_traducteur()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `traducteur`";
        $result= $conn->query($query);
    
    return $result;
    }
    public function get_client()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `client`";
        $result= $conn->query($query);
    
    return $result;
    }
    public function get_devis_traducteur($id)
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM  `devis_traducteur` as `dt` JOiN `traducteur` as `t` on `dt`.`id_traducteur`=`t`.`id` WHERE `dt`.`id_devis` NOT IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 ) and `t`.`user`='$id' ";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }
    public function get_devis_client($id)
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM  `devis` as `d` JOiN `client` as `c` on `d`.`username`=`c`.`user` LEFT JOIN `devis_traducteur` as `dt` on `dt`.`id_devis`=`d`.`id` WHERE `d`.`id` NOT IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 ) and `c`.`user`='$id' ";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }
    public function get_traduction_traducteur($id)
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM  `devis_traducteur` as `dt` JOiN `traducteur` as `t` on `dt`.`id_traducteur`=`t`.`id` WHERE `dt`.`id_devis` IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 ) and `t`.`user`='$id' ";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }
  
    public function get_traduction_client($id)
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM  `devis` as `d` JOiN `client` as `c` on `d`.`username`=`c`.`user` LEFT JOIN `devis_traducteur` as `dt` on `dt`.`id_devis`=`d`.`id` WHERE `d`.`id` IN (SELECT `id_devis` from `devis_traducteur` where `done`=1 ) and `c`.`user`='$id' ";
        $result= $conn->query($query);
        $cmp=0;
        while($row = $result->fetch_assoc()){
            $cmp++;
        }

    return $cmp;
    }

}