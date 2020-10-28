
<?php 

require_once 'Models/HomeModel.php';
class ListeTraducteurModel{

    public function get_traducteur()
    {
        $home_model = new HomeModel();
        $home_model->db_connect();
        $conn = $home_model->get_conn();
        $data;
        
    $query = "SELECT * FROM traducteur ORDER BY `type`";

    $data = $conn->query($query);
    return $data;
    }

}

?>