<?php $this->titre = 'nouveau mpd'?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SLAM</b>/PPE3</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">pour un nouveau mot de passe</p>
    <form action="?controleur=user&action=nouveauMdp" method="post"><!--GAUTIER-->
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">

        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Envoyer</button>
        </div><!-- /.col -->
      </div>
    </form>


    <a href="index.php" class="text-center">retour</a>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->