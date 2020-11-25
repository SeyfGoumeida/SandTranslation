<?php
session_start();
class DashboardDocumentView
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
}public function Document($data)
{
    ?>

    <table id="Traduc">
        <tr>
             <td> Devis/Traduction </td>
            <td> Username Client </td>
            <td> Username Traducteur  </td>
            <td> Date de soumission </td>
            <td> Document </td>
            <td> Supprimer Document </td>
            <td> Document </td>
            
            
        </tr>
        <?php

    while ($row = $data->fetch_assoc()) {
        $nomtraducteur = $row['user'];
        $nomclient = $row["username"];
        $date = $row["date"];
        $document = $row["fichier"];
        $type = $row["type"];
        $done = $row["done"];
        $id = $row["id"];

        
      

        echo '<tr>
                
              <td>';if($row["done"]==1){echo 'Traduction';}else{ echo 'Devis';} echo'</td>
              <td>' . $nomclient . '</td>
              <td>' . $nomtraducteur . '</td>
              <td>' . $date . '</td>
              <td>' . $document . '</td>
              <form method="POST" action="DashboardDocument.php">
                  <input type="hidden" value="' . $id . '" name="document"> </input>
                  <td ><button type="submit" value="Submit" name=> supprimer </button></td>
                </form>
              <td>' . $type . '</td>
            
             
           
             
          </tr>';

    };
    $data->free();
    ?>
    </table>
    </div>
    

    <?php
}
}
?>