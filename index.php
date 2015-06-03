<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require 'model/include_dao.php'; 
        $bdd = bdd::getInstance();
        $balise = baliseDAO::getInstance();    
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Voilier</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="js/ajax_Map.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/refresh.js"></script>
    <script type="text/javascript" src="js/refresh_logs.js"></script>
    <script type="text/javascript" src="js/add_balise.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <span class="light">Accueil</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#interface">Interface</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Logs</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Interface voilier</h1>
                        <p class="intro-text">Challenge Microtransat</p>
                        <a href="#interface" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Interface Section -->
    <section id="interface" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-5">
                <h2>Informations</h2>
                <?php
                    $nbBox = $bdd->get_nbID(); //Récupère le nombre d'ID de bateaux différents pour afficher le bon nombre de boites
                    $id_tab = $bdd->get_allID(); //Récupère les ID différents
                                
                    for ($i = 0; $i < $nbBox ; $i++) { //Boucle qui affiche les boites avec les données dedans
                        $resultatdonnees = $bdd->aff_inf($id_tab[$i]);
                        $bdd->affichage($resultatdonnees);
                    }
                ?>
            </div>
            <div class="col-lg-7">
                <h2>Carte</h2>
                <div id="map" class="map"></div>
                <form action="/" method="post" id="formulaire_balise">
                    <input type="text" name="Latitude" placeholder="Latitude" id="latBuoy">
                    <input type="text" name="Longitude" placeholder="Longitude" id="longBuoy">
                    <input type="button" class="btn btn-mini" id="button_buoy" value="Ajouter bouée"/>
                </form>
            </div>
        </div>
    </section>

    <!-- Informations Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Logs</h2>
                    <div id="container-logs">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact</h2>
                <p>Vous pouvez suivre les news du Challenge ici !</p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/isenbrest" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/ISEN.Brest" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; ISEN 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- Envoie de balise vers les bateaux -->
    
</body>

</html>
