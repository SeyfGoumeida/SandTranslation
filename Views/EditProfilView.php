<?php
session_start();

class EditProfilView 
{
    
    public function Header()
    {
        ?>
        <!------------------------------------HEADER----------------------------------------------->
        <head>
        <meta name="Traduction_de_documents" />
        <link href="CSS/MyCSS.css" rel="stylesheet"  type="text/css" />
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
        <li ><a href="./TypeTraduction.php">  typeTraduction </a>
        
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
                <?php if (isset($_SESSION['email'])) {;?>
                        <form action="php\LogOut.php" method="POST" id="form">
                            <button  type="submit" id="logout">Deconnecter</button>
                        </form>
                <?php } ?>
        </li>
    </ol>
    </nav>

   
    <!------------------------------------Articles-------------------------------------------->
    <?php
    }
    public function Articles()
    {
    ?> 
     <!------------------------------------Profil------------------------------------------------>
     <?php if (isset($_SESSION['email'])) {
        if(isset($_SESSION['asser_justif'])){$asser="oui";}else{$asser="non";};
                    echo ' <div style="color:black;" id="sc-edprofile">
                       <h1>Profile </h1>
                       <form class="sc-container" >
                           <label>Username :'.$_SESSION['username'].'</label><br/>
                           <label>Nom : '.$_SESSION['nom'].'</label><br/>
                           <label>Prenom: '.$_SESSION['prenom'].'</label><br/>
                           <label>telephone : '.$_SESSION['phone'].'</label><br/>
                           <label>Email : '.$_SESSION['email'].'</label><br/>
                           <label>Adresse :'.$_SESSION['adresse'].'</label><br/>
                           <label>Wilaya :'.$_SESSION['wilaya'].'</label><br/>
                           <label>Commune :'.$_SESSION['commune'].'</label><br/>';
                           if ($_SESSION['traducteur']==1)
                         {
                          echo' 
                            <label>fax :'.$_SESSION['fax'].'</label><br/>
                           <label>type de traducteur : '.$_SESSION['type'].'</label><br/>
                           <label>assenmente: '.$asser.'</label><br/>'; }
                
                        
                      echo'</form></div>';
                      
     }?>
   
        <?php if (isset($_SESSION['email'])) {;?>
                        
     
        <div id="sc-edprofile">
            <h1>Edit Profile Form</h1>
            
            <form class="modal-content" action="Models/EditProfilModel.php" method="POST">

                <h3>Modifier Profile</h3>
                <hr>

                <label for="username"><b>Nom d' utilisateur</b></label>
                <input value="<?=$_SESSION["username"]?>" type="text" placeholder="Nom d' utilisateur" name="username" >

                <label for="name"><b>Nom</b></label>
                <input value="<?=$_SESSION["nom"]?>" type="text" placeholder="Nom" name="nom" >

                <label for="prenom"><b>Péenom</b></label>
                <input value="<?=$_SESSION["prenom"]?>" type="text" placeholder="Prenom" name="prenom" >

                <label for="email"><b>Email</b></label>
                <input value="<?=$_SESSION["email"]?>" type="text" placeholder="Email" name="email" >

                <label for="psw"><b>Mot de passe</b></label>
                <input value="<?=$_SESSION["psw"]?>" type="password" placeholder="Mot de passe" name="psw" >

                <label for="phone"><b>Telephone</b></label>
                <input value="<?=$_SESSION["phone"]?>" type="text" placeholder="Telephone" name="phone" >

                <label for="adresse"><b>Adresse</b></label>
                <input value="<?=$_SESSION["adresse"]?>" type="text" placeholder="Adresse" name="adresse" >

                <label for="commune"><b>commune</b></label>
                <input value="<?=$_SESSION["commune"]?>" type="text" placeholder="commune" name="commune" >

                <label for="wilaya"><b>wilaya</b></label>
                <input value="<?=$_SESSION["wilaya"]?>" type="text" placeholder="wilaya" name="wilaya" >



                 <?php if ($_SESSION['traducteur']==1) { ?> 

                <label for="fax"><b>Fax</b></label>
                <input value="<?=$_SESSION["fax"]?>" type="text" placeholder="fax" name="fax" >

                <label for="CV"><b>Attacher notre CV sous format PDF : </b></label>
                <input value="<?=$_SESSION["cv"]?>" type="file" placeholder="CV" name="CV" accept="application/pdf" >

                <label for="Langues"><b>Langues : </b></label>
                <select multiple name="Lng[]" >
                    <option value="Arabe">Arabe</option>
                    <option value="Francais">Francais</option>
                    <option value="Anglais">Anglais</option>
                    <option value="allemande">allemande</option>
                    <option value="Turque">Turque</option>
                </select>

                <label for="type"><b>type de traducteur : </b></label>
                <select name="type" value='<?=$_SESSION["type"]?>'> 
                    <option value="general">General</option>
                    <option value="web">WEB</option>
                    <option value="scientifique">Scientifique</option>
                </select> 

                <label for="ref"><b>Fichier de referance 1 : </b></label>
                <input value="<?=$_SESSION["ref1"]?>" type="file" placeholder="Justif" name="Justif1" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 2 :</b></label>
                <input value="<?=$_SESSION["ref2"]?>" type="file" placeholder="Justif" name="Justif2" accept="application/pdf">
                <label for="ref"><b>Fichier de referance 3 :</b></label>
                <input value="<?=$_SESSION["ref3"]?>" type="file" placeholder="Justif" name="Justif3" accept="application/pdf">
                <label for="asser"><b>traducteur assermenté : </b></label>

                <input value="<?=$_SESSION["assermente"]?>" type="checkbox" placeholder="Asser" name="Asser" id="myCheck" onclick=" Assermente()">
                <div id="Justif">
                <label for="phone"><b>Justificatif : </b></label>
                <input value="<?=$_SESSION["asser_justif"]?>" type="file" placeholder="Justif" name="Justif" accept="application/pdf">
                </div>

                 <?php } ?>

                <div class="clearfix">

                    <button  type="submit" class="Soumettre">Soumettre </button>

                </div>
            </form>
        </div>
        <?php } ?>
        <?php if (!isset($_SESSION['email'])) {;?>   
         <a href="index.php" ><button > crier un compte d'abord  </button></a>
        <?php }?>

   
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
            <li ><a href="./ typeTraduction.php">  typeTraduction </a>
            
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

