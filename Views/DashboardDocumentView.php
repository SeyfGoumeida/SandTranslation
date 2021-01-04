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

    
    <?php
}public function Document($data)
{
    ?>
<div class="Dash" >
<h1>La Liste des documents devis ou traduits </h1>
    <table id="Traduc">
        <tr>
             <td> Devis/Traduction </td>
            <td> Username Client </td>
            <td> Username Traducteur  </td>
            <td> Date de soumission </td>
            <td> Document </td>
            <td> Supprimer CV </td>
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
}public function CV($data)
{
    ?>
 <div class="Dash" >
 <h1>La Liste CVs </h1>

    <table id="Traduc">
        <tr>
            <td> nom </td>
            <td> prenom </td>
            <td> Username   </td>
            <td> CV </td>
            <td> Supprimer Document </td>
  
        </tr>
        <?php

    while ($row = $data->fetch_assoc()) {
        $username = $row['user'];
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $cv = $row["cv"];
        

        echo '<tr>
     
              
              <td>' . $nom . '</td>
              <td>' . $prenom . '</td>
              <td>' . $username . '</td>
              <td>' . $cv . '</td>
              <form method="POST" action="Models/CvModel.php">
                  <input type="hidden" value="' . $username . '" name="username"> </input>
                  <td ><button type="submit" value="Submit" name=> supprimer </button></td>
                </form>

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