<?php
class AdminModel
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

    public function Session($traducteur,$username,$email,$nom ,$prenom,$psw,$phone,$adresse,$commune,$wilaya,$fax,$ref1,$ref2,$ref3,$asser_justif,$cv,$type)
    {
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['traducteur']= $traducteur;
    $_SESSION['email']= $email;
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['psw'] =$psw;                            
    $_SESSION['phone']=$phone;
    $_SESSION['adresse']=$adresse;
    $_SESSION['commune'] =$commune;
    $_SESSION['wilaya']=$wilaya;
    $_SESSION['fax']=$fax;
    $_SESSION['ref1']=$ref1;
    $_SESSION['ref2']=$ref2;
    $_SESSION['ref3']=$ref3;
    $_SESSION['asser_justif']=$asser_justif;
    $_SESSION['cv']=$cv;
    $_SESSION['type']=$type;


    }

}