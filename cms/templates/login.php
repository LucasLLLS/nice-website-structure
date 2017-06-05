<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Log in - PDM Blog</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo"><a href="/">Site <b></b></a></div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Logue-se para acessar</p>
        <?php if(isset($flash['error'])) { ?>
          <p class="text-red"><?php echo $flash['error']; ?></p>
        <?php } ?>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="Email"/> <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password"/> <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Logar</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo BASE_URL_PUBLIC_ADMIN; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>

	
