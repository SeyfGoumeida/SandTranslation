<?php

require_once('Models/HomeModel.php');
class ProposModel
{

    private $home_model; 

    function __construct()
    {
        $this->home_model = new HomeModel() ;   
    }
    
    public function get_propos()
    {


            $this->home_model->db_connect();
            $conn = $this->home_model->get_conn();
            $sql = "SELECT * FROM `propos`";
            $result = $conn->query($sql);
            $this->home_model->db_disconnect();
    
        return $result;
    }


}