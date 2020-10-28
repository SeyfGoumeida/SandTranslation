<?php

require_once '../Models/RecrutementModel.php';
require_once '../Views/RecrutementView.php';

$recrutement_model = new RecrutementModel();
$recrutement_model->db_connect();
$conn = $recrutement_model->get_conn();




/*-------- nouveau client--------------*/ 
if (!isset($_SESSION['email']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $psw = $_POST['psw'];
    $phone = $_POST['phone'];
    $languages =  $_POST['Lng'];
    $adresse = $_POST['adresse'];
    $commune = $_POST['commune'];
    $wilaya = $_POST['wilaya'];
    $Fax = $_POST['fax'];
};
/*-----------ancien client--------- */
if (isset($_SESSION['email']))
{

  

    $username = $_SESSION["username"] ;
    $email = $_SESSION['email'];
    $nom = $_SESSION['nom'];
    $prenom =$_SESSION['prenom'];
    $psw = $_SESSION['psw'];
    $phone = $_SESSION['phone'];
    $languages =  $_POST['Lng'];
    $adresse = $_SESSION['adresse'];
    $commune = $_SESSION['commune'];
    $wilaya = $_SESSION['wilaya'];
    $Fax = $_SESSION['fax'];

}
/*-----------infos communs---------- */
$CV = $_POST['CV'];
if (isset($_POST['Asser'])) {
    // Checkbox is selected
    $Asser = '1';
} else {
   // Alternate code
   $Asser = '0';
};
$Justif = $_POST['Justif'];
$Justif1 = $_POST['Justif1'];
$Justif2 = $_POST['Justif2'];
$Justif3 = $_POST['Justif3'];
$type = $_POST['type'];

if (!isset($_SESSION['email']))
{
/*insertion dans la table des utilisateur comme un nouveau traducteur  */
$sql1 = "INSERT INTO `users`(`username`,`email`, `pwd`, `traducteur`, `admin`, `blocked`) VALUES ('$username','$email','$psw',1,0,0)";
}
if (isset($_SESSION['email']))
{
    $sql1 = " UPDATE `users` SET `traducteur`='1' WHERE `username`='$username'";
}
/*insertion dans la table des traducteurs  */

$sql2 = "INSERT INTO `traducteur`(`nom`, `prenom`, `email`, `adresse`, `telephone`, `user`,`wilaya`,`commune`,`fax`,`cv`,`assermente`,`justif_asser`,`ref1`,`ref2`,`ref3`,`type`) VALUES ('$nom','$prenom','$email','$adresse','$phone','$username','$wilaya','$commune','$Fax','$CV','$Asser','$Justif','$Justif1','$Justif2','$Justif3','$type')";
$sql3 ="DELETE FROM `client` WHERE `user`= '$username'";

if (($conn->query($sql1)) and ($conn->query($sql2))and ($conn->query($sql3))) {

    $result = $conn->query("SELECT `id` FROM `traducteur` WHERE `user`='$username'");
    $row = $result->fetch_assoc();
    $id=$row['id'];
    foreach ( $languages as $language) {
        
        $conn->query("INSERT INTO `lng_traducteur`(`traducteur_id`, `language`) VALUES ('$id' ,'$language')");
        
    
    };

   

    $recrutement_model->db_disconnect();
    session_start();
    $_SESSION["traducteur"]=1;
    $_SESSION["email"] = $email;
    header("Location: ../index.php");
   
};
?>