<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Structure | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>css/libs/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>css/libs/modal.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>css/custom.css" rel="stylesheet" type="text/css" />


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/raphael-min.js"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/fastclick/fastclick.min.js'></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>dist/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/maskedinput/jquery.maskedinput.min.js"></script>

    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>js/libs/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>js/libs/modal.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>js/libs/jquery.form.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>js/custom.js" type="text/javascript"></script>

    <script>

    </script>


</head>
<body class="skin-green sidebar-mini ">
    <div class="wrapper">
        <header class="main-header">

            <a href="/" class="logo">
                <span class="logo-mini">
                    <b>STR</b>
                </span>


                <span class="logo-lg">
                    <b>Structure</b>
                </span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#">
                                <span class="hidden-xs">Sair</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <?php include 'menu.php'; ?>

        <div class="content-wrapper">

            <section class="content-header" >
                <h4><?php echo $titlePage; ?></h4>

                <?php if( isset($titlePage) && count($titlePage) > 0 ): ?>
                    <ol class="breadcrumb">
                        <?php foreach( explode( '-', $titlePage ) as $a): ?>
                            <li><?php echo $a; ?></li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </section>

            <section class="content">
