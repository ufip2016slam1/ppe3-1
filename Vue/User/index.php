<?php $this->titre = 'connexion' ?>
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html"><b>SLAM</b>/PPE3</a>
</div><!-- /.login-logo -->
<div class="login-box-body">
<p class="login-box-msg">pour demarer ta session</p>
<form action=<?php $this->lien('user', 'connexion') ?> method="post"><!--GAUTIER-->
  <div class="form-group has-feedback">
    <input type="email" class="form-control" placeholder="Email" name="email"/>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <input type="password" class="form-control" placeholder="Mot de passe" name="password"/>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          <input type="checkbox"> Maintenir session
        </label>
      </div>
    </div><!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">se connecter</button>
    </div><!-- /.col -->
  </div>
</form>

<a href=<?php $this->lien('user', 'nouveauMdp') ?>>mot de passe oublier</a><br>
<a href=<?php $this->lien('user', 'register') ?> class="text-center">nouveau membre</a>

</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

