<?php
session_start();
class DashboardTraducteurView
{

    public function Header()
    {
        ?>
<!------------------------------------HEADER----------------------------------------------->

<head>
    <meta name="Traduction_de_documents" />
    <link href="CSS/MyCSS.css" rel="stylesheet" type="text/css" />
    <script src="scripts/Script.js"></script>

</head>
<!--------------------------------------TITLE---------------------------------------------->
<?php
}
    public function Title()
    {
        ?>
<title> Home </title>
<!---------------------------------------LOGO------------------------------------------------->
<?php
}
    public function Logo()
    {
        ?>

<body>
    <div Class="Dashnav" >

    <a href="index.php"><img id="logo" src="./Img/Sand-Logo.png" alt="Traslation logo" ></a>
        <a href="linkedin.com"><img id="page" src="./Img/Linkedin.png" alt="Linkedin"></a>
        <a href="facebook.com"> <img id="page" src="./Img/Facebook.png" alt="Facebook"></a>
        <a href="instagram.com"><img id="page" src="./Img/Instagram.png" alt="Instagram"></a>
        <a href="twitter.com"><img id="page" src="./Img/Twitter.png" alt="Twitter"></a>
        
    </div>

    <ul class="Dashul">
    <?php if (isset($_SESSION['username']) ) {;?>

        <?php if ($_SESSION['username']=="admin") {;?>  
                <form action="php\LogOutAdmin.php" method="POST" id="form" >
                    <li class="Dashli"><button type="submit" id="logo">Deconnecter</button></li>
                </form>   
        <?php }?>
    <?php }?>    

    <li class="Dashli"><a href="#Statistique">Statistique</a></li>
    <li class="Dashli"><a href="DashboardClient.php">Clients</a></li>
    <li class="Dashli"><a href="DashboardTraducteur.php">Traducteurs</a></li>
    <li class="Dashli"><a href="DashboardDocument.php">Documents</a></li>
   
    </ul>

    <div class="Dash" >
    <?php
}public function Traducteur($data)
{
    ?>

    <table id="Traduc">
        <tr>
            
            <td> Nom </td>
            <td> Pranom </td>
            <td> Email </td>
            <td> Type </td>
            <td> Assermante </td>
            <td> Signaler </td>
            <td> Bocker </td>
        </tr>
        <?php

    while ($row = $data->fetch_assoc()) {$type = $row['type'];
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $email = $row["email"];
        if ($row["assermente"] == 0) {
            $assermante = "non ";
        } else {
            $assermante = "oui";
        }

        $note = $row["note"];
        $nbrdoc = $row["nbrdoc"];
        $wilaya = $row["wilaya"];
        $commune = $row["commune"];
        $telephone = $row["telephone"];
        $username = $row["user"];

        echo '<tr>
                
              
              <form method="POST" action="DashboardProfile.php">
              <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
              <input type="hidden" value="" name="user_client"> </input>
              <td ><button type="submit" value="Submit" name=>'.$nom.' </button></td>
              </form>
              <td>' . $prenom . '</td>
              <td>' . $email . '</td>
              <td>' . $type . '</td>
              <td>' . $assermante . '</td>
             
              <form method="POST" action="Models/SupprimerTraducteurModel.php">
              <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
              <td ><button type="submit" value="Submit" name=> Supprimer </button></td>
              </form>
              <form method="POST" action="Models/BlockerTraducteurModel.php">
              <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
              <td ><button type="submit" value="Submit" name=> Blocker </button></td>
              </form>
          </tr>';

    };
    $data->free();
    ?>
    </table>
    </div>
    

    <!----------------------------------------NAV------------------------------------------>
    
 

    <!------------------------------------FOOTER------------------------------------------------>
    <?php
}
}
?>