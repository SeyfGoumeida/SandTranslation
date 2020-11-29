<?php
class DashboardClientModel
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
    public function get_client()
    {
       
        $this->db_connect();
        $conn = $this->get_conn();
        $data;
        
    $query = "SELECT * FROM client as c LEFT JOIN users as u on `c`.`user`=`u`.`username`";

    $data = $conn->query($query);
    return $data;
    }

}