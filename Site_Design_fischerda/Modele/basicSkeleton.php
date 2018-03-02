<?php

/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 02.03.2018
 * Time: 08:49
 */


class basicSkeleton
{


    function Head(){
        return '
            <!DOCTYPE html>
            <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
            <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
            <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
            <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Yo</title>
                <!--
              //////////////////////////////////////////////////////
            
              FREE HTML5 TEMPLATE
              DESIGNED & DEVELOPED by FREEHTML5.CO
            
              Website: 		http://freehtml5.co/
              Email: 			info@freehtml5.co
              Twitter: 		http://twitter.com/fh5co
              Facebook: 	https://www.facebook.com/fh5co
            
              //////////////////////////////////////////////////////
               -->
            
            
            
                <link rel="shortcut icon" href="Ressources/images/IconBook.ico">
            
                <!-- Google Webfont -->
                <link href=\'http://fonts.googleapis.com/css?family=Lato:300,400,700\' rel=\'stylesheet\' type=\'text/css\'>
                <!-- Themify Icons -->
                <link rel="stylesheet" href="Ressources/css/themify-icons.css">
                <!-- Bootstrap -->
                <link rel="stylesheet" href="Ressources/css/bootstrap.css">
                <!-- Owl Carousel -->
                <link rel="stylesheet" href="Ressources/css/owl.carousel.min.css">
                <link rel="stylesheet" href="Ressources/css/owl.theme.default.min.css">
                <!-- Magnific Popup -->
                <link rel="stylesheet" href="Ressources/css/magnific-popup.css">
                <!-- Superfish -->
                <link rel="stylesheet" href="Ressources/css/superfish.css">
                <!-- Easy Responsive Tabs -->
                <link rel="stylesheet" href="Ressources/css/easy-responsive-tabs.css">
                <!-- Animate.css -->
                <link rel="stylesheet" href="Ressources/css/animate.css">
                <!-- Theme Style -->
                <link rel="stylesheet" href="Ressources/css/style.css">
                <!-- LightBox Style -->
                <link rel="stylesheet" href="Ressources/css/lightbox.css">
            
            
                <!-- Modernizr JS -->
                <script src="Ressources/js/modernizr-2.6.2.min.js"></script>
                <!-- FOR IE9 below -->
                <!--[if lt IE 9]>
                <script src="js/respond.min.js"></script>
                <![endif]-->
            
            </head>';
    }
    function HeaderNav(){
        return '<header id="fh5co-header-section" role="header"  >
                        <div class="container">
                    
                    
                    
                            <!-- <div id="fh5co-menu-logo"> -->
                            <!-- START #fh5co-logo -->
                            <h1 id="fh5co-logo" class="pull-left"><a href="Accueil.php">BookFactor</a></h1>
                    
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                    
                    
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li class="active">
                                        <a href="Accueil.php">Accueil</a>
                                    </li>
                    
                                    <li><a href="Categorie.php">Catégorie</a></li>
                                    <li><a href="MonLivre.php">Mon Livre</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- </div> -->
                    
                        </div>
                    </header>
                    <div id="fh5co-hero" style="background-image: url(Ressources/images/slide_2.jpg);">
    <div class="overlay"></div>
    <a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
    <!-- End fh5co-arrow -->
    <div class="container">
        <div class="col-md-12">
            <div class="fh5co-hero-wrap">
                <div class="fh5co-hero-intro">
                    <h1 class="to-animate hero-animate-1">Bienvenue sur Book Factor !</h1>
                    <h2 class="to-animate hero-animate-2">David Fischer et Géraud Silvestri</h2>
                    <p class="to-animate hero-animate-3"><a href="Inscription.php"  class="btn btn-outline btn-md">S\'inscrire</a></p>
                    <p class="to-animate hero-animate-3"><a href="Log.php" class="btn btn-outline btn-md">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
                    
                    
                    ';
    }
    function Footer(){
        return '<footer role="contentinfo" id="fh5co-footer">
                    <a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 footer-box">
                                <h3 class="fh5co-footer-heading">Notre équipe</h3>
                                <ul class="fh5co-footer-links">
                                    <li><a href="mailto:fischerda@etml.educanet2.ch">David Fischer</a></li>
                                    <li><a href="mailto:silvestrige@etml.educanet2.ch">Géraud Silvestri</a></li>
                
                
                                </ul>
                
                            </div>
                            <div class="col-md-4 col-sm-6 footer-box">
                                <!-- LOGO ETML -->
                
                            </div>
                            <div class="col-md-4 col-sm-12 footer-box">
                                <h3 class="fh5co-footer-heading">Quelques liens </h3>
                                <ul class="fh5co-footer-links" >
                
                                    <li><a href="#">Accueil</a></li>
                                    <li><a href="#">Ajouter un livre</a></li>
                                    <li><a href="#">Les livres</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 footer-box text-center">
                                <a href="https://www.etml.ch/"><img src="Ressources/images/Logo-ETML-bleu_foncé-complet-avec-VD-vect.jpg" alt="logo etml"></a>
                                <div class="fh5co-copyright">
                                    <p>&copy; 2015 Free Valet. All Rights Reserved. <br>Designed by <a href="http://freehtml5.co" target="_blank">FREEHTML5.co</a> Images by: <a href="http://unsplash.com" target="_blank">Unsplash</a></p>
                                </div>
                            </div>
                
                        </div>
                        <!-- END row -->
                        <div class="fh5co-spacer fh5co-spacer-md"></div>
                    </div>
                </footer>
                
                
                <!-- jQuery -->
                <script src="Ressources/js/jquery-1.10.2.min.js"></script>
                <!-- jQuery Easing -->
                <script src="Ressources/js/jquery.easing.1.3.js"></script>
                <!-- Bootstrap -->
                <script src="Ressources/js/bootstrap.js"></script>
                <!-- Owl carousel -->
                <script src="Ressources/js/owl.carousel.min.js"></script>
                <!-- Magnific Popup -->
                <script src="Ressources/js/jquery.magnific-popup.min.js"></script>
                <!-- Superfish -->
                <script src="Ressources/js/hoverIntent.js"></script>
                <script src="Ressources/js/superfish.js"></script>
                <!-- Easy Responsive Tabs -->
                <script src="Ressources/js/easyResponsiveTabs.js"></script>
                <!-- FastClick for Mobile/Tablets -->
                <script src="Ressources/js/fastclick.js"></script>
                <!-- Parallax -->
                <script src="Ressources/js/jquery.parallax-scroll.min.js"></script>
                <!-- Waypoints -->
                <script src="Ressources/js/jquery.waypoints.min.js"></script>
                <!-- Main JS -->
                <script src="Ressources/js/main.js"></script>
                <!-- LightBox -->
                <script src="Ressources/js/lightbox.js"></script>';
    }
    function ContentHome(){
        $content = '<div id="fh5co-main"><div class="fh5co-cards"><div class="container-fluid"><div class="row animate-box"><div class="col-md-12 heading text-center"><h2>Nos derniers Livres</h2></div></div><div  class="row">';
        for ($i = 0 ; $i < 5 ; $i++)
            $content.= '<div style="width: 20%" class="col-lg-2-5 col-md-2 col-sm-2 animate-box"><a class="fh5co-card" href="#"><img src="Ressources/images/img_large_1.jpg" alt="Free HTML5 Bootstrap template" class="img-responsive"><div class="fh5co-card-body"><h3>Titre : </h3><h5>Auteur : </h5><h5>Date de Sortie : </h5><h5>Posté par : </h5></div></a></div>';

        $content.= "";
        var_dump($content);
        //</div></div></div><div class="container"><div class="row text-center" id="fh5co-features"><div class="col-md-12 heading animate-box"><h2>Dans quel but a été créer ce site</h2></div><p>Ce site à été créer lors du projet Web2 réaliser en php!</p></div><!-- END row --></div><!-- END container --><div style="background-color: whitesmoke"><div class="row animate-box"><div class="col-md-12 heading text-center"><hr><h2>Le livre de la semaine</h2><hr></div></div><div class="animate-box fh5co-product-2"><div class="fh5co-half img" style="background-image: url(images/img_large_6.jpg);"></div><div class="fh5co-half"><h3>This is Symbol</h3><p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p><p><a href="#" class="btn btn-outline btn-md">Get Started</a></p></div></div></div></div>";
    }


}
