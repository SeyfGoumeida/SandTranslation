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
    
<ul class="Dashul">
    <li class="Dashli"><h1><a href="Dashboard.php">Dashboard</a> </h1></li>
    <li class="Dashli"><h2><a href="#Statistique">Statistique</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardClient.php">Clients</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardTraducteur.php">Traducteurs</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardDocument.php">Documents</a></h2></li>
    <li class="Dashli">
   
    <?php if (isset($_SESSION['username']) ) {;?>
    <?php if ($_SESSION['username']=="admin") {;?>  
            <form action="php\LogOutAdmin.php" method="POST" >
                <button type="submit" >Deconnecter</button>
            </form>   
    <?php }?>
    <?php }?>
    </li>  
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
        $bloque = $row["bloque"]; 

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
             
              ';if($bloque==0){
                echo '<form method="POST" action="Models/BlockerTraducteurModel.php">
                <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
                <td ><button type="submit" value="Submit" name=> Blocker </button></td>
                </form>';}else{echo'
                <form method="POST" action="Models/DeblockerTraducteurModel.php">
                <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
                <td ><button type="submit" value="Submit" name=> Deblocker </button></td>
                </form>';}echo'
    
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