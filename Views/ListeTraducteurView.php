<?php
session_start();
class ListeTraducteurView
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
<title> Liste des traducteurs </title>
<!---------------------------------------LOGO------------------------------------------------->
<?php
}
    public function Logo()
    {
        ?>

<body>
    <div>

        <a href="index.php"><img id="logo" src="./Img/Sand-Logo.png" alt="Traslation logo"></a>

        <?php if (isset($_SESSION['email'])) {;?>
        <a href="EditProfil.php"> <img id="profil" src="./Img/Profil.webp" alt="Instagram"></a>
        <?php }?>

        <a href="linkedin.com"><img id="page" src="./Img/Linkedin.png" alt="Linkedin"></a>
        <a href="facebook.com"> <img id="page" src="./Img/Facebook.png" alt="Facebook"></a>
        <a href="instagram.com"><img id="page" src="./Img/Instagram.png" alt="Instagram"></a>
        <a href="twitter.com"><img id="page" src="./Img/Twitter.png" alt="Twitter"></a>

    </div>
    <!----------------------------------------NAV------------------------------------------>
    <?php
}
    public function NAV()
    {
        ?>
    <nav>
        <ol class="Menu">
            <li><a href="./index.php"> Acceuil </a>

            </li>
            <li><a href="./TypeTraduction.php"> TypeTraduction </a>

            </li>
            <li><a href="./ListeTraducteur.php">Liste des traducteurs </a>

            </li>
            <li><a href="./Blog.php"> Blog </a>

            </li>
            <li><a href="./Recrutement.php"> Recrutement </a>

            </li>
            <?php if (isset($_SESSION['email'])) {;?>
                <li><a href="./Devis.php">Devis/Traduction</a>

                </li> 
                <?php }?>
            </li>
            <?php if (isset($_SESSION['traducteur'])) { if ($_SESSION['traducteur']) {;?>
                <li><a href="./Traduction.php">Tradution</a>

                </li> 
                <?php }}?>
            <li><a href="./Propos.php"> à propos </a>

            </li>

            <!--------------------logout--------------->
            
                <?php if (isset($_SESSION['email'])) {;?>
                             
                <li>
                <form action="php\LogOut.php" method="POST" id="form">
                    <button type="submit" id="logout">Deconnecter</button>
                </form>
                </li>
                
                <?php }?>
           
        </ol>
    </nav>

    <!------------------------------------Articles-------------------------------------------->
    <?php
}
    public function Articles($data)
    {
        ?>
    <form method="POST" action="Models/SignalerModel.php">
        <table id="Traduc">
            <tr>
                <td> Type </td>
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Assermante </td>
                <td> Note </td>
                <td> Nombre des documents traduits </td>
                <td> Wilaya </td>
                <td> Commune </td>
                <td> Telephone </td>
                <td> Signaler </td>
                <td> Noter </td>


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

                  <td>' . $type . '</td>
                  <td>' . $nom . '</td>
                  <td>' . $prenom . '</td>
                  <td>' . $email . '</td>
                  <td>' . $assermante . '</td>
                  <td>' . $note . '</td>
                  <td>' . $nbrdoc . '</td>
                  <td>' . $wilaya . '</td>
                  <td>' . $commune . '</td>
                  <td>' . $telephone . '</td>
                  <form method="POST" action="Models/SignalerModel.php">
                  <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>
                  <td ><button type="submit" value="Submit" name=> Signaler </button></td>
                  </form>
                  <form method="POST" action="Models/NoterModel.php">
                  <input type="hidden" value="' . $username . '" name="user_traducteur"> </input>

                 <td>
                    <button type="submit" name="rating" value="5" id="button">&#9733;</button>
                    <button type="submit" name="rating" value="4" id="button">&#9733;</button>
                    <button type="submit" name="rating" value="3" id="button">&#9733;</button>
                    <button type="submit" name="rating" value="2" id="button">&#9733;</button>
                    <button type="submit" name="rating" value="1" id="button">&#9733;</button>

                </td>
                  </form>



              </tr>';

        };
        $data->free();
        ?>
        </table>

        <!------------------------------------FOOTER------------------------------------------------>
        <?php
}
    public function Footer()
    {
        ?>
        <footer>


            <p class="copyright"></p>

            <ul>
                <li><a href="./index.php"> Acceuil </a>

                </li>
                <li><a href="./TypeTraduction.php"> TypeTraduction </a>

                </li>
                <li><a href="./ListeTraducteur.php">Liste des traducteurs </a>

                </li>
                <li><a href="./Blog.php"> Blog</a>

                </li>
                <li><a href="./Recrutement.php"> Recrutement </a>

                <?php if (isset($_SESSION['email'])) {;?>
                <li><a href="./Devis.php">Devis</a>

                </li> 
                <?php }?>
                <?php if (isset($_SESSION['traducteur'])) { if ($_SESSION['traducteur']) {;?>
                <li><a href="./Traduction.php">Tradution</a>

                </li> 
                <?php }}?>
                </li>
                <li><a href="./Propos.php"> à propos </a>

                </li>       
            </ul>
        </footer>
</body>

</html>
<?php
}
}
?>