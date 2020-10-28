<?php
session_start();

class ProposView 
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
        <title> A propos </title>
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
        <li ><a href="./index.php"> Acceuil </a>
        
        </li>
        <li ><a href="./TypeTraduction.php"> TypeTraduction </a>
        
        </li>
        <li ><a href="./ListeTraducteur.php">Liste des traducteurs </a>
        
        </li>
        <li ><a href="./Blog.php"> Blog </a>
        
        </li>
        <li ><a href="./Recrutement.php"> Recrutement </a>
        
        </li>
        <li ><a href="./Propos.php"> à propos </a>
        
        </li>

        <!--------------------logout--------------->
        <li>
                <?php if (isset($_SESSION['username'])) {;?>
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
    public function Articles($data)
    {
    $row = $data->fetch_assoc();

    echo '
             <h1 style=" color:white;">A Propos</h1>';

    echo '<p style="text-align:center;">'.$row['contenu'].'</p>';
    
    
    }
    public function Footer()
    {
    ?>
    
     <!------------------------------------FOOTER------------------------------------------------>
    <footer>
        
        
        <p class="copyright"></p>
    
        <ul >
            <li ><a href="./index.php"> Acceuil </a>
            
            </li>
            <li ><a href="./TypeTraduction.php"> TypeTraduction </a>
            
            </li> 
            <li ><a href="./ListeTraducteur.php">Liste des traducteurs </a>
            
            </li>
            <li ><a href="./Blog.php"> Blog gggg </a>
            
            </li>
            <li ><a href="./Recrutement.php"> Recrutement </a>
            
            </li>
            <li ><a href="./Propos.php"> à propos </a>
            
            </li>
        </ul>
    </footer>
    </body >
    </html>
    <?php
    }  
}
?>

