<?php
session_start();
class DashboardStatistiqueView
{

    public function Header($devis,$traduction,$devis_client,$traduction_client,$devis_traducteur,$traduction_traducteur)
    {
?>
<!------------------------------------HEADER----------------------------------------------->

<head>
    <meta name="Traduction_de_documents" />
    <link href="CSS/MyCSS.css" rel="stylesheet" type="text/css" />
    <script src="scripts/Script.js"></script>
    <!--      statistique-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawall);
    google.charts.setOnLoadCallback(drawclient);
    google.charts.setOnLoadCallback(drawtraducteur);

    function drawall() {
        var data = new google.visualization.arrayToDataTable([
            ['Type', 'Nombre',{ role: "style" }] <?php
                echo ",[' ', ,' ']";
                echo ",['Devis', " . $devis .
                    ",'silver']";
                echo ",['Traduction', " . $traduction .
                    ",'gold']";
                echo ",[' ', ,' ']";
        ?>

        ]);
        var options = {
            width: 600,
           height: 400,
            legend: {
                position: 'none'
            },
            chart: {
                title: '',
                subtitle: ''
            },
            axes: {
                x: {
                    0: {
                        side: '',
                        label: ''
                    }
                }
            },
            bar: {
                groupWidth: "90%"
            },
            hAxis: {title: 'Nombre', titleTextStyle: {color: '#dbb466'}},
           colors: ['#dbb466','silver'],
           backgroundColor: { fill: "#162936" }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };

    function drawclient() {
        var data = new google.visualization.arrayToDataTable([
            ['Type', 'Nombre',{ role: "style" }] <?php
                echo ",[' ', ,' ']";
                echo ",['Devis', " . $devis_client .
                    ",'silver']";
                echo ",['Traduction', " . $traduction_client .
                    ",'gold']";
                echo ",[' ', ,' ']";
        ?>

        ]);
        var options = {
            width: 600,
           height: 400,
            legend: {
                position: 'none'
            },
            chart: {
                title: '',
                subtitle: ''
            },
            axes: {
                x: {
                    0: {
                        side: '',
                        label: ''
                    }
                }
            },
            bar: {
                groupWidth: "90%"
            },
            hAxis: {title: 'Nombre', titleTextStyle: {color: '#dbb466'}},
           colors: ['#dbb466','silver'],
           backgroundColor: { fill: "#162936" }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_client'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };

    function drawtraducteur() {
        var data = new google.visualization.arrayToDataTable([
            ['Type', 'Nombre',{ role: "style" }] <?php
                echo ",[' ', ,' ']";
                echo ",['Devis', " . $devis_traducteur .
                    ",'silver']";
                echo ",['Traduction', " . $traduction_traducteur .
                    ",'gold']";
                echo ",[' ', ,' ']";
        ?>

        ]);
        var options = {
            width: 600,
           height: 400,
            legend: {
                position: 'none'
            },
            chart: {
                title: '',
                subtitle: ''
            },
            axes: {
                x: {
                    0: {
                        side: '',
                        label: ''
                    }
                }
            },
            bar: {
                groupWidth: "90%"
            },
            hAxis: {title: 'Nombre', titleTextStyle: {color: '#dbb466'}},
           colors: ['#dbb466','silver'],
           backgroundColor: { fill: "#162936" }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_traducteur'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
    </script>


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
    

    
<ul class="Dashul">
    <li class="Dashli"><h1><a href="Dashboard.php">Dashboard</a> </h1></li>
    <li class="Dashli"><h2><a href="DashboardStatistique.php">Statistique</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardClient.php">Clients</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardTraducteur.php">Traducteurs</a></h2></li>
    <li class="Dashli"><h2><a href="DashboardDocument.php">Documents</a></h2></li>
    <li class="Dashli">
   
    <?php if (isset($_SESSION['username']) ) {;?>
    <?php if ($_SESSION['username']=="admin") {;?>  
            <form action="php\LogOutAdmin.php" method="POST" >
                <button type="submit" >Deconnecter</button>
            </form>   
    <?php }?>
    <?php }?>
    </li>  
    </ul>

    
    <?php
}public function Statistique($devis,$traduction,$traducteur,$devis_traducteur,$traduction_traducteur,$client,$devis_client,$traduction_client)
{

    ?>
     
<div class="Dash" >
    <div class="row">
        <div class="column" >
        <form action="DashboardStatistique.php" method="POST">
        Entre : <input type="date" name="apres"> Et :<input type="date" name="avant">
        <input type="submit"  value="Choisir la date ">
        <h2> <?php echo ' nombre de traduction : '.$traduction; ?></h2>
        <h2> <?php echo ' nombre de devis : '.$devis; ?></h2>
        </form>
        </div>
        <div class="column" >

            <h1> Devis et Traduction</h1>
            <form action="DashboardStatistique.php" method="POST">
            <div id="chart_div" style="width: 800px; height: 500px;"></div>
           
            
           
        </div>
       
        <div class="column" >
            
            
            <label for="Langues"><b>Choisir traducteur : </b></label>
           
                <select name="devistraducteur" id="mySelect" >
                    <?php
                    while ($row = $traducteur->fetch_assoc()) {
                        echo '<option value="'. $row['user'] .'">' . $row['user'] . '</option> ';
                    }?>
                </select>
                Entre : <input type="date" name="apres"> Et :<input type="date" name="avant">
 
                <input type="submit" onclick="gettraducteur()" value="appliquer sur ce traducteur ">
                <h2> <?php echo ' nombre de devis : '.$devis_traducteur; ?></h2>
                <h2> <?php echo ' nombre de traduction : '.$traduction_traducteur; ?></h2>
                
            </form>
        
        </div>

        <div class="column" >
        <div id="chart_traducteur" style="width: 800px; height: 500px;"></div>
               
            
        </div>

        <div class="column" >
            
            
            <label for="Langues"><b>Choisir traducteur : </b></label>
            <form action="DashboardStatistique.php" method="POST">
                <select name="devisclient" id="mySelectclient" >
                    <?php
                    while ($row = $client->fetch_assoc()) {
                        echo '<option value="'. $row['user'] .'">' . $row['user'] . '</option> ';
                    }?>
                </select>
                Entre : <input type="date" name="apres"> Et :<input type="date" name="avant">
                <input type="submit"  onclick="getclient()" value="Appliquer sur ce client ">
                <h2> <?php echo ' nombre de devis : '.$devis_client; ?></h2>
                <h2> <?php echo ' nombre de traduction : '.$traduction_client; ?></h2>
                
            </form>
        
        </div>

        <div class="column" >
        <div id="chart_client" style="width: 800px; height: 500px;"></div>
 

        </div>
    </div>
</div>


    <?php
}
}
?>