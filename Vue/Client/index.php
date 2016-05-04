<?php
$this->titre = "ajouter client";
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

          // on empeche l'execution du script accordion lors du clic sur une checkbox
          $('#accordion input[type=\"checkbox\"]').click(function(e) {
                e.stopPropagation();
            });

          /* Lors de la validation du formulaire de mise a jour
          * */
          $(\".miseAJour\").bind(\"submit\", function(e){
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
<div class="content-wrapper">
    <div style="display: none" id="controleurAssocier">client</div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Client</h1>
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
                                    <h3 class="box-title">Ajouter un Client</h3>
                                </div>
                                <div class="box-body">
                                    <form action="<?php $this->lien('client', 'add') ?>" method="post"
                                          class="insertion"><!--GAUTIER-->

                                        <!-- NOM -->
                                        <div class="form-group ">
                                            <label>Nom:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatText"
                                                       type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask
                                                       name="nom"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- PRENOM -->
                                        <div class="form-group">
                                            <label>Prenom:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatText"
                                                       type="text" class="form-control"
                                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="prenom"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Raison sociale -->
                                        <div class="form-group">
                                            <label>Raison sociale:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-university"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatText"
                                                       type="text"
                                                       data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                       data-mask name="raison_sociale"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Adresse -->
                                        <div class="form-group">
                                            <label>Adresse:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatText"
                                                       type="text" data-inputmask="'alias': 'ip'" data-mask
                                                       name="adresse"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Code postal -->
                                        <div class="form-group">
                                            <label>Code postal:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatCodePostal"
                                                       type="text" data-inputmask="'alias': 'ip'" data-mask
                                                       name="code_postal"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Ville -->
                                        <div class="form-group">
                                            <label>Ville:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatText"
                                                       type="text" data-inputmask="'alias': 'ip'" data-mask
                                                       name="ville"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label>Email:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isFormatMail"
                                                       type="text" data-inputmask="'alias': 'ip'" data-mask
                                                       name="mail"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- TELEPHONE -->
                                        <div class="form-group">
                                            <label>Telephone:</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input class="champ_ajout form-control " data-type="isPhoneNumber"
                                                       type="text" data-inputmask='"mask": "(999) 999-9999"' data-mask
                                                       name="telephone"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <button type="submit" submit="return false;"
                                                class="btn btn-primary btn-block btn-flat ajouter">Ajouter
                                        </button>
                                    </form>

                                    <!--FIN FORM-->

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                        </div>

                        <!-- Main content -->

                        <div class="col-xs-12"> <!--PARTIE 2-->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Liste des Clients</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>
                                                    Chercher:
                                                    <input class="form-control input-sm champ_ajout" type="search"
                                                           placeholder="" aria-controls="example1"></i></label>
                                            </div>

                                        </div>

                                        <div class="col-md-6">


                                            <!--aenlever <button type="submit" class="btn btn-primary">suprimer les clients selectionnÃ©s</button> -->

                                        </div>

                                    </div>

                                    <div class="row">
                                        <!--TABLEAU-->
                                        <table id="example2" class="table table-bordered table-hover detail">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Raison sociale</th>
                                                <th>Adresse</th>
                                                <th>Code postal</th>
                                                <th>Ville</th>
                                                <th>Telephone</th>
                                                <th>E-mail</th>
                                                <th>Select</th>
                                            </tr>
                                            </thead>
                                            <tbody id="accordion">
                                            <?php
                                            foreach ($clients as $client) {
                                                ?>
                                                <tr class="parentAccordion">
                                                    <td><?= $client['nom'] ?></td>
                                                    <!--Nom-->
                                                    <td><?= $client['prenom'] ?></td>
                                                    <!--Prenom-->
                                                    <td><?= $client['RS'] ?></td>
                                                    <!--Raison sociale-->
                                                    <td><?= $client['adresse'] ?></td>
                                                    <!--Adresse-->
                                                    <td><?= $client['CP'] ?></td>
                                                    <!--E-mail-->
                                                    <td><?= $client['ville'] ?></td>
                                                    <!--Code postal-->
                                                    <td><?= $client['tel'] ?></td>
                                                    <!--Ville-->
                                                    <td>test</td>
                                                    <!--Telephone-->
                                                    <td>
                                                        <button type="button" class="btn btn-primary">editer</button>
                                                    </td>
                                                    <td><input type="hidden" class="id" value="<?= $client['id'] ?>">
                                                    </td>
                                                    <!--Select-->
                                                    <td><input type="checkbox" class="index"
                                                               value="<?= $client['id'] ?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="11">
                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <td>
                                                                    <form
                                                                        action="<?php $this->lien('client', 'update') ?>"
                                                                        method="post" class="miseAJour"><!--GAUTIER-->

                                                                        <!-- NOM -->
                                                                        <div class="form-group ">
                                                                            <label>Nom:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatText" 
                                                                                       type="text"
                                                                                       value="<?= $client['nom'] ?>"
                                                                                       data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                       data-mask name="nom"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- PRENOM -->
                                                                        <div class="form-group">
                                                                            <label>Prenom:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatText"
                                                                                       type="text"
                                                                                       value="<?= $client['prenom'] ?>"
                                                                                       class="form-control"
                                                                                       data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                                       data-mask name="prenom"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- Raison sociale -->
                                                                        <div class="form-group">
                                                                            <label>Raison sociale:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-university"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatText"
                                                                                       type="text"
                                                                                       value="<?= $client['RS'] ?>"
                                                                                       data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                                                       data-mask name="raison_sociale"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- Adresse -->
                                                                        <div class="form-group">
                                                                            <label>Adresse:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-envelope-o"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatText" 
                                                                                       type="text"
                                                                                       value="<?= $client['adresse'] ?>"
                                                                                       data-inputmask="'alias': 'ip'"
                                                                                       data-mask name="adresse"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- Code postal -->
                                                                        <div class="form-group">
                                                                            <label>Code postal:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-envelope"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatCodePostal" 
                                                                                       type="text"
                                                                                       value="<?= $client['CP'] ?>"
                                                                                       data-inputmask="'alias': 'ip'"
                                                                                       data-mask name="code_postal"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- Ville -->
                                                                        <div class="form-group">
                                                                            <label>Ville:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-building"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatText" 
                                                                                       type="text"
                                                                                       value="<?= $client['ville'] ?>"
                                                                                       data-inputmask="'alias': 'ip'"
                                                                                       data-mask name="ville"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- Email -->
                                                                        <div class="form-group">
                                                                            <label>Email:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-building"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isFormatMail"
                                                                                       type="text"
                                                                                       value="<?= $client['mail'] ?>"
                                                                                       data-inputmask="'alias': 'ip'"
                                                                                       data-mask name="mail"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->

                                                                        <!-- TELEPHONE -->
                                                                        <div class="form-group">
                                                                            <label>Telephone:</label>

                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                    <i class="fa fa-phone"></i>
                                                                                </div>
                                                                                <input class="champ_modif form-control " data-type="isPhoneNumber" 
                                                                                       type="text"
                                                                                       value="<?= $client['tel'] ?>"
                                                                                       data-inputmask='"mask": "(999) 999-9999"'
                                                                                       data-mask name="telephone"/>
                                                                            </div>
                                                                            <!-- /.input group -->
                                                                        </div>
                                                                        <!-- /.form group -->
                                                                        <input type="hidden" class="id" name="id"
                                                                               value="<?= $client['id'] ?>">
                                                                        <button type="submit" submit="return false;"
                                                                                class="btn btn-primary btn-block btn-flat modifier">
                                                                            Modifier
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <form action="<?php $this->lien('client', 'droit') ?>"
                                                                          method="post" class="droit">
                                                                        <fieldset>
                                                                            <legend>Selection des utilisateur</legend>
                                                                            <?php
                                                                            $i = 0;
                                                                            foreach ($users as $user) {
                                                                                $i ++;
                                                                                ?>
                                                                                <label
                                                                                    for="option<?= $i ?>"><?= $user['identifiant'] ?></label>
                                                                                <input type="checkbox" id="option<?= $i ?>"
                                                                                        <?php if (in_array($user['id_user'], $client['user'])) echo 'checked';?>
                                                                                       name="user<?= $user['id_user'] ?>" value="<?= $user['identifiant'] ?>"><br/>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <input type="hidden" class="id" name="id"
                                                                                   value="<?= $client['id'] ?>">
                                                                            <button type="submit" submit="return false;"
                                                                                    class="btn btn-primary btn-block btn-flat">
                                                                                Attibuer clients
                                                                            </button>
                                                                        </fieldset>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Raison sociale</th>
                                                <th>Adresse</th>
                                                <th>Code postal</th>
                                                <th>Ville</th>
                                                <th>Telephone</th>
                                                <th>E-mail</th>
                                                <th>Select</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                    <div class="col-md-12">


                                        <!--SUPPCLIENT-->
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary supprimer"
                                                        formaction=<?php $this->lien('client', 'delete') ?>>suprimer les
                                                    clients selectionnÃ©s
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
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
     
