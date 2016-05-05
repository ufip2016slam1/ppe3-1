<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SLAM/PPE3</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <!-- Bootstrap 3.3.4 -->
  <link href="Contenu/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="Contenu/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="Contenu/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <!-- insertion des fichier CSSS specifique -->
  <?php
  if (isset($addCSS))
    echo $addCSS;
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href=<?php $this->lien() ?> class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SL/</b>PPE3</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Slam</b>PPE3</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">USERNAME</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  USERNAME

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="col-xs-4 text-center">

                </div>

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                  <a href=<?php $this->lien('user', 'deconnexion') ?> class="btn btn-default btn-flat">Deconnexion</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="header">
          NAVIGATION
        </li>

        <!--NAVICALENDAR-->
        <li>
          <a href=<?php $this->lien('reservation') ?>>
            <i class="fa fa-calendar"></i> <span>Calendrier</span>
            <small class="label pull-right bg-red"></small>
          </a>
        </li>

        <!--NAVIFacture-->
        <li>
          <a href=<?php $this->lien('facture') ?>>
            <i class="fa fa-user "></i> <span>Facturation</span>
            <small class="label pull-right bg-yellow"></small>
          </a>
        </li>

        <?php 
        /**
        * si admin 
        *
        **/
        if( $user['admin'] ) {
          ?>
       
          <!--NAVIClient-->
          <li>
            <a href=<?php $this->lien('client') ?>>
              <i class="fa fa-users"></i> <span>Client</span>
              <small class="label pull-right bg-yellow"></small>
            </a>
          </li>

          <!--NAVISalle-->
          <li>
            <a href=<?php $this->lien('salle') ?>>
              <i class="fa fa-square-o "></i> <span>Salle</span>
              <small class="label pull-right bg-yellow"></small>
            </a>
          </li>

          <!--NAVICatégorie-->
          <li>
            <a href=<?php $this->lien('categorie') ?>>
              <i class="fa fa-square-o "></i> <span>Catégorie</span>
              <small class="label pull-right bg-yellow"></small>
            </a>
          </li>

          <!--NAVIUser-->
          <li>
            <a href=<?php $this->lien('user', 'affichage') ?> id="lien_utilisateurs" name="lien_utilisateurs">
              <i class="fa fa-user "></i> <span>Utilisateurs</span>
              <small class="label pull-right bg-yellow"></small>
            </a>
          </li>
        <?php 
        }
        ?>
      <ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- ====================Contenu=========================== -->

  <?= $contenu ?>

  <!--=====================ContenuFIN===========================-->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="Contenu/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="Contenu/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="Contenu/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='Contenu/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="Contenu/dist/js/app.min.js" type="text/javascript"></script>

<!--    insertion des fichiers JS specifique a la page-->
<?php
if (isset($addJS))
  echo $addJS;
?>

<script>
  /*
   * Lors de la validation d'un formulaire insere les element en BDD
   * bloque l'action normale pour la realiser en ajax
   */
  $(".insertion").bind("submit", function(e){
    e.preventDefault(); // on bloque le comportement par defaut du navigateur
    // on stocke l'objet JQuery formulaire
    var formulaire = $(this);

    $.ajax({
      url: formulaire.attr('action'), // Le nom du fichier indiqué dans le formulai
      method: 'post',
      data: formulaire.serialize(),
      // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
      success: function() {
        console.log('retour AJAX OK');
        ajaxAjoutTab();
        $("input").val('');
      }

    });
  });

  $(".supprimer").on("click", function() {
    // on recupere le controleur qui sera destinataire des requetes
    var controleur = $('#controleurAssocier').html();

    // on recupere les objets a supprimer
    var chckBxSeclected = $(".index:checked");
    chckBxSeclected.each(function(){
      var data = {};
      var input = $(this);
      data['id_'+controleur] = input.val();
      $.get('?controleur='+ controleur +'&action=supprimer',
          data,
          function (data, status, xhr) {
            if(status == 'success'){
              input.closest('tr').remove();
            }
          });
    });
  });

  function ajaxAjoutTab(){
    console.log('dbt ajout Tab');
    //recuperation des valeurs des champs du formumaire
    //On stock la construction de la ligne du tableau dans tabData  ;
    var tabData ;
    var champ = $('.champ_ajout') ;

    if(champ){

      tabData ='<tr>' ;

      champ.each(function(){
        tabData += '<td>'+ $(this).val() +'</td>';

      });

      tabData += '</tr>' ;
      //la methode .html permet
      $('tbody').append(tabData) ;

    }

    console.log(tabData) ;
    //alert('test gabari3 l 562');
    return false;
  }


  $(document).ready(function() {

    function verif(champ,valeur){

      switch(champ) {

        case 'isPhoneNumber' :
          var reg = /^[+0-9. ()-]*$/;
          break ;

        case 'isFormatCodePostal' :
          var reg = /^[0-9]{5}$/;
          break ;

        case 'isFormatMail' :
          var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
          break ;

        case 'isFormatDate' :
          var reg = /^([0-9]{4})-((0?[0-9])|(1[0-2]))-((0?[0-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/ ;
          break ;

        case 'isFormatHeure' :
          var reg = /^[0-9]{2}:[0-9]{2}?$/ ;
          break ;

        case 'isFormat2Nb'  :
          var reg = /^[0-9]{2}?$/ ;
          break ;

        case 'isFormatColor' :
          var reg = /^(#[0-9a-fA-F]{6}|[a-zA-Z0-9-]*)$/;
          break ;

        /*case 'isPhoneNumber'  :
         var reg = /^[+0-9. ()-]*$/;
         break ;
         */



        default :
          return false ;
          break ;

      }

      return reg.test(valeur);


    }

    $('.champ_ajout').on('blur', function(){

      // On stock l'element courant pour eviter la redondance 
      $this = $(this) ;

      //on recupere la valeur et le type de l'input 
      valeur = $this.val();
      valeur = valeur.replace(/\<[a-z0-9+.\/]*\>/g, "<essaie encore>");
      $this.val(valeur);

      typeChamp = $this.attr('data-type') ;

      // On test le type 
      //si isFormatText on echappe les balises html 
      if(typeChamp == 'isFormatText'){

        retour = true ;
        //sinon appel de la fonction verif
      }else{
        retour = verif(typeChamp , valeur) ;
      }

      //alert visuel et verrouillage du bouton Ajouter 
      if(!retour) {
        $this.css('background','red');
        $('.ajouter').attr('disabled','disabled');
      }else{
        $this.css('background','transparent');
        $('.ajouter').removeAttr('disabled');
      }
    });

    $('.modifier').on('click',function(){
      //niveau de la parentAccordion precedent 
      var modif = new Array();
      var page = $('h1').text() ;


      $(this).closest('form').children().children().children('.champ_modif').each(function(){
        modif.push($(this).val()) ;
      });

      console.log(modif);
      var i = 0 ;
      console.log(page);

      if(page=='Client' || page=='Categorie'){
        $(this).closest('tr').closest('td').parent().prev().children().each(function(){
          $(this).html(modif[i]);
          i++ ;
        });
      }else{
        $(this).closest('tr').prev().children().each(function(){
          $(this).html(modif[i]);
          i++ ;
        });
      }

    }) ;


  });


</script>
</body>
</html>