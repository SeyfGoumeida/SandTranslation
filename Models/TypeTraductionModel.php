
<?php 

require_once 'Models/HomeModel.php';
class TypeTraductionModel{

    public function get_type()
    {
        $home_model = new HomeModel();
        $home_model->db_connect();
        $conn = $home_model->get_conn();
        $data;
        
    $query = "SELECT * FROM type_traduction";

    $data = $conn->query($query);
    return $data;
    }

}

?>