<?php
session_start();
class AdminView
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
public function SignIn()
    {
        ?>
    <!--------------------------------------connecter---------------------------->

    <div >
        <div  class="modal">
            <form class="modal-content" action="php\connecterAdmin.php" method="POST">
                <div class="container">
                    <h4>Admin Connection</h4>
                    <hr>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Email" id="email" name="email" required>

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" placeholder="Mot de passe" id="psw" name="psw" required>

                    <div class="clearfix">
                        <button type="submit" name='submit' class="signupbtn">connecter</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
    
   
    
    <?php
}
}
?>