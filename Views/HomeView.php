<?php
session_start();
class HomeView
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
                <li><a href="./Devis.php">Devis</a>

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
    public function Articles($article, $article1, $article2)
    {

        ?>
    <div class="contenu">
        <div id="description">
            <div id="partdescription">
                <h2><?=$article["Titre"]?> </h2>
                <p><?=substr($article["Contenu"], 0, 0.2 * strlen($article["Contenu"]))?><span id="dots">...</span>
                    <span
                        id="more"><?=substr($article["Contenu"], 0.2 * strlen($article["Contenu"]) + 1, strlen($article["Contenu"]))?></span>
                </p>
                <button onclick="Readmore()" id="myBtn">Read more</button>
            </div>

            <div id="partdescription">
                <h2><?=$article1["Titre"]?></h2>
                <p><?=substr($article1["Contenu"], 0, 0.2 * strlen($article1["Contenu"]))?><span id="dots1">...</span>
                    <span
                        id="more1"><?=substr($article1["Contenu"], 0.2 * strlen($article1["Contenu"]) + 1, strlen($article1["Contenu"]))?></span>
                </p>
                <button onclick="Readmore1()" id="myBtn1">Read more</button>
            </div>

            <div id="partdescription">
                <h2><?=$article2["Titre"]?></h2>
                <p><?=substr($article2["Contenu"], 0, 0.2 * strlen($article2["Contenu"]))?><span id="dots2">...</span>
                    <span
                        id="more2"><?=substr($article2["Contenu"], 0.2 * strlen($article2["Contenu"]) + 1, strlen($article2["Contenu"]))?></span>
                </p>
                <button onclick="Readmore2()" id="myBtn2">Read more</button>
            </div>
        </div>

        <!------------------------------------Forms-------------------------------------------->
        <?php
}
    public function Forms()
    {
        ?>
        <?php if (!isset($_SESSION['email'])) {;?>

        <div id="forme">
            <div id="buttons">
                <button onclick="form1()">Inscrire</button>
                <button onclick="form2()">Connecter</button>
            </div>
        
            <?php }?>

            <?php
}
    public function Devis($language_src, $language_dest, $type)
    {
        ?>
            <!-----------------------inscrire pour faire une demande de devis de traduction d’un document  ------------------------>
            <?php if (!isset($_SESSION['email'])) {;?>
            <div>
                <button onclick="form1()">Faire une demande de devis de traduction d’un document </button>
            </div>
            <?php }?>

            <!------------------------------------------Demande de devis----(client)----------------------------------------------->

            <form class="Devis" <?php if (!isset($_SESSION['email'])) {?> style="display:none;" <?php }?>
                action="php/Devis.php" method="POST">

                <h4 style="text-align:center;background-color: #dbb466; color:#162936;">
                    Formulaire pour une demande de devis de traduction d’un document</h4>
                <hr>
                <label for="name"><b>Nom :</b></label>
                <input type="text" placeholder="Nom" name="name" required>

                <label for="lastname"><b>Prenom :</b></label>
                <input type="text" placeholder="Prénom" name="lastname" required>


                <label for="tlph"><b>Telephone :</b></label>
                <input type="text" placeholder="phone" name="phone" required>


                <label for="email"><b>Email :</b></label>
                <input type="text" placeholder="Email" name="email" required>

                <label for="adr"><b>Adresse :</b></label>
                <input type="text" placeholder="adresse" name="adr" required>

                <label for="Langues"><b>Langue source : </b></label>
                <select name="Lng_src">
                    <?php

        while ($row = $language_src->fetch_assoc()) {
            echo '<option value="' . $row['des'] . '">' . $row['des'] . '</option> ';
        }

        ?>
                </select>

                <label><b>Langue destination: </b></label>

                <select name="Lng_dest">
                    <?php

        while ($row = $language_dest->fetch_assoc()) {
            echo '<option value="' . $row['des'] . '">' . $row['des'] . '</option> ';
        }

        ?>
                </select>
                <label for="TypeTraduction"><b>Type traduction : </b></label>
                <select name="type">
                    <?php

        while ($row = $type->fetch_assoc()) {
            echo '<option value="' . $row['des'] . '">' . $row['des'] . '</option> '

            ;
        }
        ?>
                </select>

                <label for="Commentaires"><b>Commentaires : </b></label>
                <textarea rows="3" cols="70" name="Comnt"> Commentaire </textarea>

                <label for="Ficher"><b>Selectionner le fichier a traduire : </b></label>
                <input type="file" name="Fichier">

                <label for="Assermente"><b>Traducteur assermenté : </b></label>
                <input type="checkbox" name="Assermente" value="Assermente"> Assermenté <br>
                <!-- START CAPTCHA -->
                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
                </div>
                <!-- END CAPTCHA -->


                <button type="submit" class="signupbtn">Submit</button>

        </div>
        </form>
    </div>

    <?php
}
    public function SignUp()
    {
        ?>
    <!--------------------------------------inscrire---------------------------->
    <div class="box">
        <div id="id01" class="modal">

            <form class="modal-content" action="php\SignUp.php" method="POST">

                <h4>Inscrire</h4>
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

                <label for="adresse"><b>Adresse</b></label>
                <input type="text" placeholder="Adresse" name="adresse" required>

                <label for="commune"><b>Commune</b></label>
                <input type="text" placeholder="commune" name="commune" required>

                <label for="wilaya"><b>Wilaya</b></label>
                <input type="text" placeholder="Wilaya" name="wilaya" required>

                <label for="fax"><b>Fax</b></label>
                <input type="text" placeholder="Fax" name="fax" required>




                <div class="clearfix">
                    <button type="button" onclick="document.getElementsByClassName('box')[0].style.display = 'none'"
                        class="cancelbtn">Annuler</button>
                    <button type="submit" class="signupbtn">Inscrire</button>

                </div>
            </form>

        </div>
    </div>

    <?php
}
    public function SignIn()
    {
        ?>
    <!--------------------------------------connecter---------------------------->

    <div class="box">
        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close"
                title="Close Modal"></span>
            <form class="modal-content" action="php\connecter.php" method="POST">
                <div class="container">
                    <h4>Connecter</h4>
                    <hr>



                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Email" id="email" name="email" required>

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" placeholder="Mot de passe" id="psw" name="psw" required>


                    <div class="clearfix">
                        <button type="button" onclick="document.getElementsByClassName('box')[1].style.display = 'none'"
                            class="cancelbtn">Annuler</button>
                        <button type="submit" name='submit' class="signupbtn">connecter</button>
                    </div>



                </div>
            </form>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
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