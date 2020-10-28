<?php
class BlogModel
{
    //a modifier celon la base de données
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tdw_projet";
    private $conn;
    private $result;
  



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

    public function db_article_query($first_try)
    {
        if ($first_try) {
            $sql = "SELECT * FROM `articles` ORDER BY `Date` ASC ";
            $this->result = $this->conn->query($sql);
        };

        $row = $this->result->fetch_assoc();
        return $row;
    }

    public function get_conn()
    {
        return $this->conn;
    }
    public function get_articles()
    {
            $this->db_connect();
            $sql = "SELECT * FROM `articles` ORDER BY `Date` ASC ";
            $this->result = $this->conn->query($sql);
            $this->db_disconnect();
    
        return $this->result;
    }


}