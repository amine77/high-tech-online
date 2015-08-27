<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title><?= $title ?></title>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-theme.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/datepicker3.css') ?>">


        <script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= base_url('assets/locales/bootstrap-datepicker.fr.min.js') ?>"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('') ?>">Hi-tech online
                       le coin des ventes privées <div style="position: absolute">
                           
                        </div></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li><a href="<?=  base_url('prochaines_ventes') ?>">Prochaines Ventes</a></li>
                        <li><a href="<?=  base_url('produits_phares') ?>">Produits phares</a></li>
                        <li><a href="<?=  base_url('newsletter') ?>">Newsletter</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        
                            <?php
                            if ($this->session->userdata('login')) {
//                                if ($this->session->has_userdata('articles_in_cart')) {
//                                    $nb_articles = count($_SESSION['articles_in_cart']);
//                                }
                                echo '<li><a href="#">Bonjour ' . $_SESSION['login'] . '</a></li>';
                                echo '<li><a href="'.  base_url('view_cart').'">Panier</a></li>';
                                echo '<li><a href="' . site_url('logout') . '">Déconnexion</a></li>';
                            } else {
                                echo '<li> <a href="' . site_url('login') . '">Connexion</a></li><li><a href="' . site_url('signup') . '">Inscription</a></li>';
                            }
                            ?>
                    </ul>   
                    <?php if(isset($categories) && is_array($categories) && count($categories) >0){ ?>
                    
                    <ul class="nav navbar-nav">
                        <?php foreach ($categories as $catgeorie) {?>
                        <li><a href="<?= base_url('view_category/'.$catgeorie['id']) ?>"><?=  $catgeorie['title'] ?></a></li>
                      <?php  }  ?>
                    </ul>
                    <?php  }  ?>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">