<?php
require_once '../Models/HomeModel.php';
require_once '../Views/HomeView.php';

$home_model = new HomeModel();
$home_model->db_connect();
$conn = $home_model->get_conn();

$email = $_POST['email'];
$psw = $_POST['psw'];

$sql = "SELECT * FROM `users` WHERE `email`='$email' and `pwd`='$psw'";


$result = $conn->query($sql);
$row = $result->fetch_assoc();
$USR = $row['username'];

echo $row['traducteur'];


if ($row['email'] == $email and $row['pwd'] == $psw ) {

  if ($row['traducteur']==0){
    
    
    $sql2="SELECT * FROM `client` WHERE `user`='$USR'";

    $result1 = $conn->query($sql2); $row1 = $result1->fetch_assoc();
    
    $home_model->Session($row['traducteur'],$row['username'],$row['email'],$row1['nom'] ,$row1['prenom'],$row['pwd'],$row1['telephone'],$row1['adresse'],$row1['commune'],$row1['wilaya'],"","","","","","","");

    
    }; 




  if ($row['traducteur']==1){$sql2="SELECT * FROM `traducteur` WHERE `user`='$USR'";
    $result2 = $conn->query($sql2); $row2 = $result2->fetch_assoc();
    $home_model->Session($row['traducteur'],$row['username'],$row['email'],$row2['nom'] ,$row2['prenom'],$row['pwd'],$row2['telephone'],$row2['adresse'],$row2['commune'],$row2['wilaya'],$row2['fax'],$row2['ref1'],$row2['ref2'],$row2['ref3'],$row2['asser_justif'],$row2['cv'],$row2['type']);






};

  
     
  
  
  
  $home_model->db_disconnect();
   
     header("Location: ../index.php");
} else {
    return 'erreur de connection ';
}