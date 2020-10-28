<?php
 require_once ('./HomeModel.php');
session_start();
 $conn;
 $servername = "localhost";
 $username = "root";
 $password = "";
 $db_name = "tdw_projet";

        $conn = new mysqli($servername, $username, $password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $old_username= $_SESSION['username'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nom = $_POST['nom'];
    
        $prenom = $_POST['prenom'];
        $psw = $_POST['psw'];
        $phone = $_POST['phone'];
        $adresse = $_POST['adresse'];
        $wilaya = $_POST['wilaya'];
        $commune = $_POST['commune'];
        $fax = $_POST['fax'];
        $CV = $_POST['CV'];
        if (isset($_POST['Asser'])) {
            // Checkbox is selected
            $Asser = '1';
        } else {
        // Alternate code
        $Asser = '0';
        };
        $justif_asser = $_POST['Justif'];
        $ref1 = $_POST['Justif1'];
        $ref2 = $_POST['Justif2'];
        $ref3 = $_POST['Justif3'];
        $type = $_POST['type'];

        $sql1 = "UPDATE `users` SET `username`='$username',`email`='$email' , `pwd`='$psw'  WHERE `username`='$old_username'";
        
        if($_SESSION['traducteur']==0)
        {$sql2 = "UPDATE `client`SET `user`='$username',`email`='$email',`nom`='$nom',`prenom`='$prenom',`adresse`='$adresse',`wilaya`='$wilaya',`commune`='$commune',`telephone`='$phone' WHERE `user`='$old_username' ";}
        if($_SESSION['traducteur']==1)
        {$sql2 = "UPDATE `traducteur` SET `user`='$username',`email`='$email',`nom`='$nom',`prenom`='$prenom',`adresse`='$adresse',`wilaya`='$wilaya',`commune`='$commune',`telephone`='$phone',`fax`='$fax',`cv`='$CV',`assermente`='$Asser',`justif_asser`='$justif_asser',`ref1`='$ref1',`ref2`='$ref2',`ref3`='$ref3',`type`='$type' WHERE `user`='$old_username'";} 

        if (($conn->query($sql1)) and ($conn->query($sql2))) {
       
            $conn->close();
           
            $home_model = new HomeModel();
            $home_model->Session($_SESSION['traducteur'],$username,$email,$nom,$prenom,$psw,$phone,$adresse,$commune,$wilaya,$fax,$ref1,$ref2,$ref3,$justif_asser,$CV,$type);
            header("Location:../index.php");        
        }


?>