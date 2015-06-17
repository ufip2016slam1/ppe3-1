<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PPE3 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../Contenu/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../Contenu/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../Contenu/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>SLAM</b>/PPE3</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Creer un nouveau compte</p>
        <form action="../../index.html" method="post"><!--GAUTIER-->
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Identifiant"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <!--<div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Mot de passe"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retaper mot de passe"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>-->
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> j'accepte les <a href="#">conditions</a>
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4" style="padding-right: 0px; padding-left: 0px;">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Creer un compte</button>
            </div><!-- /.col -->
          </div>
        </form>        <!--FIN FORM--> <!--GAUTIER-->


        <a href="login.php" class="text-center">Je suis deja membre</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../Contenu/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../Contenu/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../Contenu/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>