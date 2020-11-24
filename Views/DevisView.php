<?php
session_start();
class DevisView
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

            
            <?php if (isset($_SESSION['email'])) {;?>
                <li><a href="./Devis.php">Devis/Traduction</a>

                </li> 
            <?php }?>
            <?php if (isset($_SESSION['traducteur'])) { if ($_SESSION['traducteur']) {;?>
                <li><a href="./Traduction.php">Tradution</a>

                </li> 
                <?php }}?>
            </li>
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

    <!------------------------------------Diaporama-------------------------------------------->
    <?php
}
    public function Diaporama()
    {
        ?>
    <div id="APdiapo">
        <div class="diapo">
            <img src="./Diapo/1.jpg" />
            <img src="./Diapo/2.jpg" />
            <img src="./Diapo/3.png" />
            <img src="./Diapo/4.png" />
        </div>
    </div>

    <!------------------------------------Articles-------------------------------------------->
    <?php
}
    public function Devis($data, $data1)
    {
        if ($_SESSION['traducteur'] == 1) {
            ?>
    <form action='Models/AccepterModel.php' method='POST'enctype="multipart/form-data">

        <table id="Traduc">
            <tr>
                <td> Username </td>
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Telephone </td>
                <td> Langue Source </td>
                <td> Langue Destination </td>
                <td> Commentaire </td>


            </tr>

            <?php

            while ($row = $data->fetch_assoc()) {
                $username = $row['username'];
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                $email = $row["email"];
                $lang_src = $row["Lng_src"];
                $lang_dest = $row["Lng_dest"];
                $commentaire = $row["commentaire"];
                $telephone = $row["telephone"];
                $id = $row['id'];
                echo '<tr>
                  <td>' . $username . '</td>
                  <td>' . $nom . '</td>
                  <td>' . $prenom . '</td>
                  <td>' . $email . '</td>
                  <td>' . $telephone . '</td>

                  <td>' . $lang_src . '</td>
                  <td>' . $lang_dest . '</td>
                <td>' . $commentaire . '</td>
                <td><button type="submit" value="Submit" name=> Accepter </button></td>
                <input value="' . $id . '" name="id_devis" type="hidden">
              </tr>';
            };
            $data->free();

            ?>
        </table>

    </form>



    <?php
} else {
            ?>
    <form action='Models/SelectionnerTraducteurModel.php' method='POST'>

        <table id="Traduc">
            <tr>
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Telephone </td>
                <td> Langue Source </td>
                <td> Langue Destination </td>
                <td> Selectionner Traducteur </td>
                <td> justificatif </td>


            </tr>

            <?php

            while ($row = $data1->fetch_assoc()) {
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                $email = $row["email"];
                $telephone = $row["telephone"];
                $lang_src = $row["Lng_src"];
                $lang_dest = $row["Lng_dest"];
                $id = $row['id'];

                echo '<tr>

                  <td>' . $nom . '</td>
                  <td>' . $prenom . '</td>
                  <td>' . $email . '</td>
                  <td>' . $telephone . '</td>

                  <td>' . $lang_src . '</td>
                  <td>' . $lang_dest . '</td>
                <td>
                <button type="submit" value="Submit" name="select" > Selectionner </button>

                </td>
                  <td>
                <input type="file" value="file" name="file" required>
                </td>
                <input value="' . $id . '" name="id_devis" type="hidden">

              </tr>';
            };
            $data1->free();

            ?>
        </table>

    </form>


    <?php

        }
    }
    public function Footer()
    {
        ?>
    <!------------------------------------FOOTER------------------------------------------------>
    <footer>


        <p class="copyright"></p>

        <ul>
            <li><a href="./index.php"> Acceuil </a>

            </li>
            <li><a href="./TypeTraduction.php"> TypeTraduction </a>

            </li>
            <li><a href="./ListeTraducteur.php">Liste des traducteurs </a>

            </li>
            <li><a href="./Blog.php"> Blog </a>

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
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
<?php
}
}
?>