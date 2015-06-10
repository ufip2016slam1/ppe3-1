<?php $this->titre = "enregistrement"?>
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>SLAM</b>/PPE3</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Creer un nouveau compte</p>
    <form action=<?php $this->lien('user', 'register') ?> method="post"><!--GAUTIER-->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Identifiant" name="identifiant"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="mail"/>
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


    <a href="index.php" class="text-center">Je suis deja membre</a>
  </div><!-- /.form-box -->
</div><!-- /.register-box -->