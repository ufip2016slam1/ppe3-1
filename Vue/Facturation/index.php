<?php
$this->titre = "facturation";
$this->addJS =
    "
        <script src=\"Contenu/plugins/jQueryUI/jquery-ui-1.11.4.min.js\"></script>
        <script>
          $(function() {
            $( \"#accordion\" ).accordion({
                header: \".parentAccordion\",
                active: false,
                icons: false,
                collapsible: true,
                event: \"click\"
            });
          });
          /* Lors de la validation du formulaire de mise a jour
          * */
         /* $(\".miseAJour\").bind(\"submit\", function(e){
            e.preventDefault(); // on bloque le comportement par defaut du navigateur
            var formulaire = $(this); // on stocke l'objet JQuery formulaire

            $.ajax({
                url: formulaire.attr('action'),
                method: 'post',
                data: formulaire.serialize(),
                success: function(data){alert(data);}
            });
          });

           $(\".droit\").bind(\"submit\", function(e){
            e.preventDefault(); // on bloque le comportement par defaut du navigateur
            var formulaire = $(this); // on stocke l'objet JQuery formulaire

            $.ajax({
                url: formulaire.attr('action'),
                method: 'post',
                data: formulaire.serializeArray(),
                success: function(data){alert(data);}
            });
          });
        </script>
        "
?>
<!-- Content Wrapper. Contains page content -->
<!--/CONTENUFACTU-->
      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Facturation</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">

                <div class="content">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Creer une Facturation</h3>
                                </div>
                                <div class="box-body">
                                    <form action="<?php $this->lien('facturation', 'genereFacture') ?>" method="post"
                                          class="insertion"><!--GAUTIER-->

                                        <!-- NOM -->
                                        <div class="form-group">
                                                    <label>Client :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-navicon"></i>
                                                        </div><!--MENU DEROULANT-->
                                                        <select class="form-control champ_ajout" name="client">
                                                            <?php
                                                            $i = 0 ;
                                                            foreach ($lients as $client){

                                                                $i++ ; 
                                                                ?>
                                                                <option value="<?= $client ?>"<?php if($i==1) echo 'selected'?> ><?= $client ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div><!-- /.input group -->

                                                </div><!--FORM GROUPE-->

                                        <!-- DATE_FACTURE -->
                                        <div class="form-group">
                                            <label>Date de facture mensuel:</label>

                                            <div class="input-group">
                                            
                                            	<div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                
                                                <div class="row">
                                                	<div class="col-md-2">
                                                        	<input class="champ_ajout form-control " 
                                                        	data-type="isFormat2Nb"
                                                        	placeholder="mm"
                                                           	type="text" 
                                                           	name="date_fact_mois"/>
                                                               
                                                       </div>
                                                      
                                                       <div class="col-md-3">
                                                             <input class="champ_ajout form-control " 
                                                           	type="text" 
                                                           	placeholder="aaaa"
                                                           	name="date_fact_annee"/>
                                                       </div>
                                                  </div>             	
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                        <button type="submit" submit="return false;"
                                                class="btn btn-primary btn-block btn-flat ajouter">Recevoir
                                        </button>
                                    </form>
                                    <!--FIN FORM-->
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- Main content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<!--/CONTENUFACTU-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    //Evenement valeur de .index => checkBox
    $('.index').change(function () {
        //si cochÃ©
        if (this.checked) {
            //on recupere le noeud parent tr avec la fonction closest 
            //on ajoute un class sans style pour la selection 
            $(this).closest('tr').addClass('aCacher');
            ;
        } else {
            $(this).closest('tr').removeClass('aCacher');
        }

    });

    //Au click du bouton supprimer on cache l'element
    //a Mettre dans success: de la fonction ajax
    $('.supprimer').on('click', function () {
        //fadeOut plus esthetique que hide() , prend un parametre la vitresse de disparition
        //par defaut 400ms ;
        var tab = $('.aCacher').children();
        console.log(tab)
        $('.aCacher').fadeOut("slow");
    });
</script>
     
