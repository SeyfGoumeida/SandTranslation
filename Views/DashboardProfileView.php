<?php
session_start();
class DashboardProfileView
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
    <div Class="Dashnav" >
    <a href="index.php"><img id="logo" src="./Img/Sand-Logo.png" alt="Traslation logo" ></a>
        

        <a href="linkedin.com"><img id="page" src="./Img/Linkedin.png" alt="Linkedin"></a>
        <a href="facebook.com"> <img id="page" src="./Img/Facebook.png" alt="Facebook"></a>
        <a href="instagram.com"><img id="page" src="./Img/Instagram.png" alt="Instagram"></a>
        <a href="twitter.com"><img id="page" src="./Img/Twitter.png" alt="Twitter"></a>
    </div>
    <?php
    
    ?>

    <ul class="Dashul">
    <?php if (isset($_SESSION['username']) ) {;?>
    <?php if ($_SESSION['username']=="admin") {;?>  
            <form action="php\LogOutAdmin.php" method="POST" id="form" >
                <li class="Dashli"><button type="submit" id="logo">Deconnecter</button></li>
            </form>   
    <?php }?>
    <?php }?>  
    <li class="Dashli"><a href="#Statistique">Statistique</a></li>
    <li class="Dashli"><a href="DashboardClient.php">Clients</a></li>
    <li class="Dashli"><a href="DashboardTraducteur.php">Traducteurs</a></li>
    <li class="Dashli"><a href="DashboardDocument.php">Documents</a></li>
    </ul>
    <div class="Dash" >
    <?php
}public function Profile($data)
{
    $row = $data->fetch_assoc();
    //-------type-----------
    if(isset($row["type"]))
    {
        $type= $row["type"];
    }
    else { 
        $type= "";
    }   
    //-------assermente---------
    if(isset($row["assermente"]))
    {
        if ($row["assermente"] == 0) 
        {
            $assermante = "non ";
        } else {
            $assermante = "oui";
        }
    }
    
    //--------note----------
    if(isset($row["note"]))
    {
        $note= $row["note"];
    }
    //--------nbrdoc----------
    if(isset($row["nbrdoc"]))
    {
        $nbrdoc= $row["nbrdoc"];
    }
    ?>

    <table id="Traduc">
        <tr>
        
                
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Wilaya </td>
                <td> Commune </td>
                <td> Telephone </td>

                <!--  pour traducteur selement-->
                <?php  if ($type!=""){?>
                <td> Type </td>
                <td> Assermante </td>
                <td> Note </td>
                <td> Nombre des documents traduits </td>
                <?php }?>
        </tr>
        <?php

    
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $email = $row["email"];
        $wilaya= $row["wilaya"];
        $commune= $row["commune"];
        $telephone= $row["telephone"];
        
        echo '<tr>
                
                <td>' . $nom . '</td>
                <td>' . $prenom . '</td>
                <td>' . $email . '</td>
                <td>' . $wilaya . '</td>
                <td>' . $commune . '</td>
                <td>' . $telephone . '</td>
                
                ';if ($type!="")echo'
                <td>' . $type . '</td>
                <td>' . $assermante . '</td>
                <td>' . $note . '</td>
                <td>' . $nbrdoc . '</td>
              </tr>';

    
    $data->free();
    ?>
    </table>
    </div>
    <?php
}public function Devis($data)
{
    
    ?>
    

    <div  class="Dash" >
        <h1>La Liste Des Devis </h1>

        <table id="Traduc">
        <tr>
        
                <td> Username </td>
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Adresse  </td>
                <td> Telephone </td>
                <td> Type </td>
                <td> Assermante </td>
                <td> Language Source </td>
                <td> Language Destination </td>
                <td> Commentaire  </td>
                <td> Date </td>
               
        </tr>
        <?php
        while($row = $data->fetch_assoc())
        {

        $username = $row["username"]; 
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $email = $row["email"];
        $adresse= $row["adresse"];
        $telephone= $row["telephone"];
        $type= $row["type"];
        
        if ($row["assermante"] == 0) 
        {
            $assermante = "non ";
        } else {
            $assermante = "oui";
        }
        $Lng_src= $row["Lng_src"];
        $Lng_dest= $row["Lng_dest"];
        $commentaire= $row["commentaire"];
        $date= $row["date"];
        
        echo '<tr>
                 <td>' . $username . '</td>
                <td>' . $nom . '</td>
                <td>' . $prenom . '</td>
                <td>' . $email . '</td>
                <td>' . $adresse . '</td>
                <td>' . $telephone . '</td>
                <td>' . $type . '</td>
                <td>' . $assermante . '</td>
                <td>' . $Lng_src . '</td>
                <td>' . $Lng_dest . '</td>
                <td>' . $commentaire . '</td>
                <td>' . $date . '</td>
              </tr>';

       }
    ?>
    </table>
    </div>
    


    <?php
}public function Traduction($data)
{
    
    ?>
    

    <div  class="Dash" >
        <h1>La Liste Des Traduction </h1>

        <table id="Traduc">
        <tr>
        
                <td> Username </td>
                <td> Nom </td>
                <td> Pranom </td>
                <td> Email </td>
                <td> Adresse  </td>
                <td> Telephone </td>
                <td> Type </td>
                <td> Assermante </td>
                <td> Language Source </td>
                <td> Language Destination </td>
                <td> Commentaire  </td>
                <td> Date </td>
               
        </tr>
        <?php
        while($row = $data->fetch_assoc())
        {

        $username = $row["username"]; 
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $email = $row["email"];
        $adresse= $row["adresse"];
        $telephone= $row["telephone"];
        $type= $row["type"];
        
        if ($row["assermante"] == 0) 
        {
            $assermante = "non ";
        } else {
            $assermante = "oui";
        }
        $Lng_src= $row["Lng_src"];
        $Lng_dest= $row["Lng_dest"];
        $commentaire= $row["commentaire"];
        $date= $row["date"];
        
        echo '<tr>
                 <td>' . $username . '</td>
                <td>' . $nom . '</td>
                <td>' . $prenom . '</td>
                <td>' . $email . '</td>
                <td>' . $adresse . '</td>
                <td>' . $telephone . '</td>
                <td>' . $type . '</td>
                <td>' . $assermante . '</td>
                <td>' . $Lng_src . '</td>
                <td>' . $Lng_dest . '</td>
                <td>' . $commentaire . '</td>
                <td>' . $date . '</td>
              </tr>';

       }
    ?>
    </table>
    </div>
    <?php 
}}?>