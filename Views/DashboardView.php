<?php
session_start();
class DashboardView
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
    public function Dash()
    {
        ?>

<body>

    <div class="Dashboard" >
    <?php if (isset($_SESSION['username']) ) {;?>
    <?php if ($_SESSION['username']=="admin") {;?>  
            <form action="php\LogOutAdmin.php" method="POST" >
                <button type="submit" >Deconnecter</button>
            </form>   
    <?php }?>
    <?php }?> 
    <div class="row">
        <div class="column" >
            <h2> Documents</h2>
            <a href="DashboardDocument.php"><img id="dashpict" src="./Img/doc.png" alt="Linkedin"></a>
        </div>
        <div class="column" ">
            <h2>Statistiques</h2>
            <a href=""> <img id="dashpict" src="./Img/statistique.png" alt="Facebook"></a>
        </div>
        <div class="column" ">
            <h2>Clients</h2>
            <a href="DashboardTraducteur.php"><img id="dashpict" src="./Img/client.png" alt="Instagram"></a>
        </div>
        <div class="column" ">
            <h2>Traducteurs</h2>
            <a href="DashboardClient.php"><img id="dashpict" src="./Img/traducteur.png" alt="Twitter"></a>
        </div>
    </div>
    


    </div>
    <?php 
}}?>