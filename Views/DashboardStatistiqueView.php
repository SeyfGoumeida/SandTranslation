<?php
session_start();
class DashboardStatistiqueView
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
    <li class="Dashli"><h2><a href="DashboardStatistique.php">Statistique</a></h2></li>
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
}public function Statistique($devis,$traduction,$traducteur,$devis_traducteur,$traduction_traducteur,$client,$devis_client,$traduction_client)
{

    ?>
<div class="Dash" >
    <div class="row">
        <div class="column" >
        <form action="DashboardStatistique.php" method="POST">
        Entre : <input type="date" name="avant"> Et :<input type="date" name="apres">
        <input type="submit"  value="Choisir la date ">
        </form>
        </div>
        <div class="column" >

            <h1> Devis et Traduction</h1>
            <form action="DashboardStatistique.php" method="POST">
            <h2> <?php echo ' nombre de traduction : '.$traduction; ?></h2>
            <h2> <?php echo ' nombre de devis : '.$devis; ?></h2>
           
        </div>

        <div class="column" >
            
            
            <label for="Langues"><b>Choisir traducteur : </b></label>
           
                <select name="devistraducteur" id="mySelect" >
                    <?php
                    while ($row = $traducteur->fetch_assoc()) {
                        echo '<option value="'. $row['user'] .'">' . $row['user'] . '</option> ';
                    }?>
                </select>
                Entre : <input type="date" name="avant"> Et :<input type="date" name="apres">
 
                <input type="submit" id="log" onclick="gettraducteur()" value="appliquer sur ce traducteur ">

                
            </form>
        
        </div>

        <div class="column" >
            
                <h2> <?php echo ' nombre de devis : '.$devis_traducteur; ?></h2>
                <h2> <?php echo ' nombre de traduction : '.$traduction_traducteur; ?></h2>
            </form>
        </div>

        <div class="column" >
            
            
            <label for="Langues"><b>Choisir traducteur : </b></label>
            <form action="DashboardStatistique.php" method="POST">
                <select name="devisclient" id="mySelectclient" >
                    <?php
                    while ($row = $client->fetch_assoc()) {
                        echo '<option value="'. $row['user'] .'">' . $row['user'] . '</option> ';
                    }?>
                </select>
                Entre : <input type="date" name="avant" > Et :<input type="date" name="apres">
                <input type="submit" id="log" onclick="getclient()" value="Appliquer sur ce client ">

                
            </form>
        
        </div>

        <div class="column" >
            
                <h2> <?php echo ' nombre de devis : '.$devis_client; ?></h2>
                <h2> <?php echo ' nombre de traduction : '.$traduction_client; ?></h2>
            </form>
        </div>
    </div>
</div>


    <?php
}
}
?>