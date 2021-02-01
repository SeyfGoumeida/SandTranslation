<?php
session_start();

class BlogView 
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
        <title> Blog </title>
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
   
    <!------------------------------------Articles-------------------------------------------->
    <?php
    }
    public function Articles($data)
    {
    ?> 
   <table id="Traduc"> 
      <tr> 
          <td> Titre </td>
          <td> Contenu </td> 
          <td> Date </td>  
      </tr>
    <?php 
 
    while ($row = $data->fetch_assoc()) 
    {   $Titre = $row['Titre'];
        $Contenu = $row["Contenu"];
        $Date = $row["Date"];
        echo '<tr> 
       
                  <td>'.$Titre.'</td>
                  <td>'.$Contenu.'</td> 
                  <td>'.$Date.'</td>  
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
    
        <ul >
            <li ><a href="./index.php"> Acceuil </a>
            
            </li>
            <li ><a href="./TypeTraduction.php"> TypeTraduction </a>
            
            </li> 
            <li ><a href="./ListeTraducteur.php">Liste des traducteurs </a>
            
            </li>
            <li ><a href="./Blog.php"> Blog </a>
            
            </li>
            <li ><a href="./Recrutement.php"> Recrutement </a>
            
            <?php if (isset($_SESSION['email'])) {;?>
                <li><a href="./Devis.php">Devis</a>

                </li> 
            <?php }?>
            <?php if (isset($_SESSION['traducteur'])) { if ($_SESSION['traducteur']) {;?>
                <li><a href="./Traduction.php">Tradution</a>

                </li> 
                <?php }}?>
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

