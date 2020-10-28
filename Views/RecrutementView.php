<?php
session_start();

class RecrutementView 
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
<title> Recrutement </title>
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
        <?php } ?>

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
            <li><a href="./Propos.php"> à propos </a>

            </li>

            <!--------------------logout--------------->
            <li>
                <?php if (isset($_SESSION['email'])) {;?>
                <form action="php\LogOut.php" method="POST" id="form">
                    <button type="submit" id="logout">Deconnecter</button>
                </form>
                <?php } ?>
            </li>
        </ol>
    </nav>


    <!------------------------------------Articles-------------------------------------------->
    <?php
    }
    public function Articles($languages,$type)
    {
    ?>

    <!----------------------pour un client deja connecter- ---------------------------->
    <?php if (isset($_SESSION['email'])) 
    {
        if($_SESSION['traducteur']==1){
        ?>
        <h2> Vous etes deja un traducteur </h2>
        <?php }else{ ?>


    <div class="Recrute">
        <div id="id01" class="modalRecrut">

            <form class="modal-content" action="php\Recrutement.php" method="POST">

                <h3>--- upgrade to traducteur--- </h3>
                <hr>

                <label for="username"><b>Attacher notre CV sous format PDF : </b></label>
                <input type="file" placeholder="CV" name="CV" accept="application/pdf" required>

                <label for="Langues"><b>Langues : </b></label>
                <select multiple name="Lng[]">
                <?php   

                while($row=$languages->fetch_assoc())
                
                echo '<option value="'.$row['des'].'">'.$row['des'].'</option> '
    
                ?>
 
                </select>

                <label for="TypeTraduction"><b>Type traduction : </b></label>
                <select name="type">
                <?php   

                while($row=$type->fetch_assoc())

                echo '<option value="'.$row['des'].'">'.$row['des'].'</option> '

                ?>
                </select>


                <label for="ref"><b>Fichier de referance 1 : </b></label>
                <input type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 2 :</b></label>
                <input type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 3 :</b></label>
                <input type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                <label for="phone"><b>traducteur assermenté : </b></label>
                <input type="checkbox" placeholder="Asser" name="Asser" id="myCheck" onclick=" Assermente()">
                <div id="Justif">
                    <label for="justif"><b>Justificatif : </b></label>
                    <input type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                </div>



                <div class="clearfix">

                    <button type="submit" class="Soumettre">Soumettre </button>

                </div>
            </form>

        </div>
    </div>
    <?php } }?>
    <!------------------------pour un nouveau utilisateur ou traducteur ------------------------------>
    <?php if (!isset($_SESSION['email'])) {;?>
    <div class="Recrute">
        <div id="id01" class="modalRecrut">

            <form class="modal-content" action="php\Recrutement.php" method="POST">

                <h3>Recrutement d'un traducteur </h3>
                <hr>

                <label for="username"><b>Nom d' utilisateur</b></label>
                <input type="text" placeholder="Nom d' utilisateur" name="username" required>

                <label for="name"><b>Nom</b></label>
                <input type="text" placeholder="Nom" name="nom" required>

                <label for="prenom"><b>Péenom</b></label>
                <input type="text" placeholder="Prenom" name="prenom" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" required>

                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Mot de passe" name="psw" required>

                <label for="phone"><b>Telephone</b></label>
                <input type="text" placeholder="Telephone" name="phone" required>

                <label for="phone"><b>Fax</b></label>
                <input type="text" placeholder="fax" name="fax" required>

                <label for="adresse"><b>Adresse</b></label>
                <input type="text" placeholder="Adresse" name="adresse" required>

                <label for="commune"><b>commune</b></label>
                <input type="text" placeholder="commune" name="commune" required>

                <label for="wilaya"><b>wilaya</b></label>
                <input type="text" placeholder="wilaya" name="wilaya" required>

                <label for="CV"><b>Attacher notre CV sous format PDF : </b></label>
                <input type="file" placeholder="CV" name="CV" accept="application/pdf" required>

                <label for="Langues"><b>Langues : </b></label>
                <select multiple name="Lng[]" required>
                    <option value="Arabe">Arabe</option>
                    <option value="Francais">Francais</option>
                    <option value="Anglais">Anglais</option>
                    <option value="allemande">allemande</option>
                    <option value="Turque">Turque</option>
                </select>

                <label for="type"><b>type de traducteur : </b></label>
                <select name="type" required>
                    <option value="general">General</option>
                    <option value="web">WEB</option>
                    <option value="scientifique">Scientifique</option>
                </select> 

                <label for="ref"><b>Fichier de referance 1 : </b></label>
                <input type="file" placeholder="Justif" name="Justif1" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 2 :</b></label>
                <input type="file" placeholder="Justif" name="Justif2" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 3 :</b></label>
                <input type="file" placeholder="Justif" name="Justif3" accept="application/pdf">
                <label for="asser"><b>traducteur assermenté : </b></label>

                <input type="checkbox" placeholder="Asser" name="Asser" id="myCheck" onclick=" Assermente()">
                <div id="Justif">
                    <label for="phone"><b>Justificatif : </b></label>
                    <input type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                </div>



                <div class="clearfix">

                    <button type="submit" class="Soumettre" onclick="DossierOnTraitement()">Soumettre </button>

                </div>
            </form>

        </div>
    </div>
    <?php } ?>
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
            <li><a href="./Blog.php"> Blog gggg </a>

            </li>
            <li><a href="./Recrutement.php"> Recrutement </a>

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