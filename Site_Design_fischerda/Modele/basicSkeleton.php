<?php


/**
 * Created by PhpStorm.
 * User: fischerda
 * Date: 02.03.2018
 * Time: 08:49
 */


 class basicSkeleton
{

    //Basic Method//
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
                <title>BookFactor</title>
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
            
                <!-- Form Style-->
                <link rel="stylesheet" href="Ressources/css/cssForm.css">
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
                            <h1 id="fh5co-logo" class="pull-left"><a href="http://localhost:8080/P_133-BookSite/Site_Design_fischerda/?content=Home">BookFactor</a></h1>
                    
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
                    <div id="fh5co-hero">
    <div class="overlay"></div>
    <a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
    <!-- End fh5co-arrow -->';
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
    //Home Method//
     function ContentHomeHeader(){
         return'
        <div class="container">
        <div class="col-md-12">
            <div class="fh5co-hero-wrap">
                <div class="fh5co-hero-intro">
                    <h1 class="to-animate hero-animate-1">Bienvenue sur Book Factor !</h1>
                    <h2 class="to-animate hero-animate-2">David Fischer et Géraud Silvestri</h2>
                    <p class="to-animate hero-animate-3"><a href="http://localhost:8080/P_133-BookSite/Site_Design_fischerda/?page=SignIn"  class="btn btn-outline btn-md">S\'inscrire</a></p>
                    <p class="to-animate hero-animate-3"><a href="http://localhost:8080/P_133-BookSite/Site_Design_fischerda/?page=LogIn" class="btn btn-outline btn-md">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
    ';}
     function ContentHome(){




         $content='</div></div></div><div class="container"><div class="row text-center" id="fh5co-features"><div class="col-md-12 heading animate-box"><h2>Dans quel but a été créer ce site</h2></div><p>Ce site à été créer lors du projet Web2 réaliser en php!</p></div><!-- END row --></div><!-- END container --><div style="background-color: whitesmoke"><div class="row animate-box"><div class="col-md-12 heading text-center"><hr><h2>Le livre de la semaine</h2><hr></div></div><div class="animate-box fh5co-product-2"><div class="fh5co-half img" style="background-image: url(Ressources/images/Origine.jpg);"></div><div class="fh5co-half"><h3>Origine</h3><p>Robert Langdon, le célèbre professeur en symbologie, arrive au musée de Guggenheim de Bilbao pour assister à la conférence d\'un de ses anciens élèves.</p><p><a href="#" class="btn btn-outline btn-md">Lire la suite</a></p></div></div></div></div>';
         return $content;
     }
    //DoLogIn Method//
     function ContentLogInHeader(){
         return '<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="fh5co-hero-wrap">
                <div class="fh5co-hero-intro">
                    <h1 class="to-animate hero-animate-1">Connexion</h1>


                </div>
            </div>
        </div>
    </div>
</div>';
     }
     function ContentLogIn(){
         return '<div id="fh5co-main">
    <div class="container">
        <div class="fh5co-spacer fh5co-spacer-md"></div>
        <form method="POST">
            <div class="lblForm">
                <label for="mail">Adresse mail </label><br>
                <label for="password">Mot de passe </label>
            </div>
            <div class="inpForm">
                <input id="mail" type="text" name="mail"/><br>
                <input id="password" name="password" type="password"/><br>
                <input id="validate" type="submit" name="submit" value="Valider"/>
            </div>
        </form>
        <div class="fh5co-spacer fh5co-spacer-md"></div>
    </div>
    <!-- END container -->
</div>';
     }
    //SignIn Method//
     function ContentSignInHeader(){
         return '<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="fh5co-hero-wrap">
                <div class="fh5co-hero-intro">
                    <h1 class="to-animate hero-animate-1">Inscription</h1>


                </div>
            </div>
        </div>
    </div>
</div>';
     }
     function ContentSignIn(){
         return '<div class="container">


        <div class="fh5co-spacer fh5co-spacer-md"></div>
        <form method="post">


            <div class="lblForm">
                <label for="name">Nom :</label><br>
                <label for="surname">Prénom :</label><br>
                <label for="mail">Email :</label><br>
                <label for="password">Mot de passe :</label><br>
                <label for="passwordAgain">Confirmation de mot de passe:</label><br>
            </div>
            <div class="inpForm">
                <input id="name" name="name" type="text"><br>
                <input  id="surname" name="surname" type="text"><br>
                <input id="mail"  name="mail" type="text"><br>
                <input id="password"  name="password" type="password"><br>
                <input id="passwordAgain"  name="passwordAgain" type="password"><br>
                <input id="submit" name="submit" type="submit">
            </div>

        </form>







        <div class="row">


            <div class="fh5co-spacer fh5co-spacer-lg"></div>


        </div>
        <!-- END row -->



    </div>';
     }
}
