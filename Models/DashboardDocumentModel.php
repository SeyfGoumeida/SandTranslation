<?php
class DashboardDocumentModel
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
    public function get_document()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `traducteur` AS `t`JOIN `devis_traducteur` as `dt` ON `dt`.`id_traducteur`=`t`.`id` RIGHT JOIN devis as `d` ON`d`.`id`=`dt`.`id_devis` WHERE `d`.`fichier`!=''";

        $data = $conn->query($query);
    return $data;
    }
    public function get_cv()
    {
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "SELECT * FROM `traducteur` where `cv`!=''";

        $data = $conn->query($query);
    return $data;
    }
    public function supprimer_document($id)
    {
       
        $this->db_connect();
        $conn = $this->get_conn(); 
        $query = "UPDATE `devis` SET `fichier`=NULL WHERE `id`='$id'";
        $conn->query($query);

    
    }
    

}