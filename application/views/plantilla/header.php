<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Twitter -->
        <meta name="twitter:site" content="@themepixels">
        <meta name="twitter:creator" content="@themepixels">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Bracket">
        <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

        <!-- Facebook -->
        <meta property="og:url" content="http://themepixels.me/bracket">
        <meta property="og:title" content="Bracket">
        <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

        <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
        <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">


        <title>Suite de Teletrabajo</title>

        <!-- vendor css -->
        <link href="<?php echo base_url() ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/highlightjs/github.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/datatables/jquery.dataTables.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lib/select2/css/select2.min.css" rel="stylesheet">

        <!-- Bracket CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bracket.css">
    </head>
    <body>

        <!-- ########## START: LEFT PANEL ########## -->
        <div class="br-logo"><a href=""><span>[</span>ST<span>]</span></a></div>
        <?php include 'menu.php'; ?>

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="br-header">
            <div class="br-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="input-group hidden-xs-down wd-170 transition">
                    <input id="searchbox" type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- input-group -->
            </div><!-- br-header-left -->
            <div class="br-header-right">
                <nav class="nav">


                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name hidden-md-down"><?php echo $this->session->userdata('cn') ?><br><?php echo $this->session->userdata('title') ?><br><?php echo $this->session->userdata('department') ?></span>
                            <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
                            <span class="square-10 bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">

                                <li><a href="<?php echo base_url('inicio/salir')?>"><i class="icon ion-power"></i> Salir</a></li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>

            </div><!-- br-header-right -->
        </div><!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->

        <!-- ########## START: RIGHT PANEL ########## -->

        <!-- ########## END: RIGHT PANEL ########## --->
        <!-- ########## START: MAIN PANEL ########## -->
        <div class="br-mainpanel">

            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-5">
            </div>
