<?php
class RecrutementModel
{
    //a modifier celon la base de données
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tdw_projet";
    private $conn;
    private $result;
    private $email;
    private $psw;

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
    public function get_languages()
    {
       
        $this->db_connect();

        $data;
        
    $query = "SELECT * FROM language ";

    $data = $this->conn->query($query);
    return $data;
    }
    public function get_type()
    {
       
        $this->db_connect();

        $data;
        
    $query = "SELECT * FROM type_traduction ";

    $data = $this->conn->query($query);
    return $data;
    }
}