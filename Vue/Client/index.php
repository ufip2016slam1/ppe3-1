<?php $this->titre = "ajouter client"?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Client

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">
<<<<<<< HEAD
                <div class="content">


                    <div class="row">
                        <div class="col-md-6">
=======
              
				
					
                        <div class="row">
                          <div class="col-md-6">
>>>>>>> Client

                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Ajouter un Client</h3>
                                </div>
                                <div class="box-body">
                                    <form action="<?php $this->lien('client','add') ?>" method="post" class="insertion"><!--GAUTIER-->

                                        <!-- NOM -->
                                        <div class="form-group ">
                                            <label>Nom:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="nom"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- PRENOM -->
                                        <div class="form-group">
                                            <label>Prenom:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="prenom"/>
<<<<<<< HEAD
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- TELEPHONE -->
                                        <div class="form-group">
                                            <label>Telephone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask='"mask": "(999) 999-9999"' data-mask name="telephone"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- Raison sociale -->
                                        <div class="form-group">
                                            <label>Raison sociale:</label>
                                            <div class="input-group">
=======
                                              </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            
                                            <!-- Raison sociale -->
                                            <div class="form-group">
                                              <label>Raison sociale:</label>
                                              <div class="input-group">
>>>>>>> Client
                                                <div class="input-group-addon">
                                                    <i class="fa fa-university"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask name="raison_sociale"/>
<<<<<<< HEAD
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- Adresse -->
                                        <div class="form-group">
                                            <label>Adresse:</label>
                                            <div class="input-group">
=======
                                              </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            
                                            <!-- Adresse -->
                                            <div class="form-group">
                                              <label>Adresse:</label>
                                              <div class="input-group">
>>>>>>> Client
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask="'alias': 'ip'" data-mask name="adresse"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- Code postal -->
                                        <div class="form-group">
                                            <label>Code postal:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask="'alias': 'ip'" data-mask name="code_postal"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

                                        <!-- Ville -->
                                        <div class="form-group">
                                            <label>Ville:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask="'alias': 'ip'" data-mask name="ville"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->

<<<<<<< HEAD
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ajouter</button>
                                    </form>
=======

                                            <!-- TELEPHONE -->
                                            <div class="form-group">
                                              <label>Telephone:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-phone"></i>
                                                </div>
                                                <input class="champ_ajout form-control " type="text"  data-inputmask='"mask": "(999) 999-9999"' data-mask name="telephone"/>
                                              </div><!-- /.input group -->
                                            </div><!-- /.form group -->

                                            
                                            

                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ajouter</button> 
                                   </form>
>>>>>>> Client

                                    <!--FIN FORM-->

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

<<<<<<< HEAD
                        </div>

                        <!-- Main content -->

                        <div class="col-xs-12"> <!--PARTIE 2-->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Liste des Clients</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>
                                                    Chercher:
                                                    <input class="form-control input-sm champ_ajout" type="search" placeholder="" aria-controls="example1"></i></label>
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
                                                <th>E-mail</th>
                                                <th>Code postal</th>
                                                <th>Ville</th>
                                                <th>Telephone</th>
                                                <th>Select</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($clients as $client) {
                                                ?>
                                                <tr>
                                                    <td><?= $client['nom'] ?></td>
                                                    <!--Nom-->
                                                    <td><?= $client['prenom'] ?></td>
                                                    <!--Prenom-->
                                                    <td><?= $client['RS'] ?></td>
                                                    <!--Raison sociale-->
                                                    <td><?= $client['adresse'] ?></td>
                                                    <!--Adresse-->
                                                    <td><?= '' ?></td>
                                                    <!--E-mail-->
                                                    <td><?= $client['CP'] ?></td>
                                                    <!--Code postal-->
                                                    <td><?= $client['ville'] ?></td>
                                                    <!--Ville-->
                                                    <td><?= $client['tel'] ?></td>
                                                    <!--Telephone-->
                                                    <td><input type="hidden" class="id" value="<?= $client['id'] ?>"></td>
                                                    <!--Select-->
                                                    <td><input type="checkbox" class="index" name="<?= $client['id'] ?>"/></td>
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
                                                <th>E-mail</th>
                                                <th>Code postal</th>
                                                <th>Ville</th>
                                                <th>Telephone</th>
                                                <th>Select</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <!-- /.box-body -->
                                    </div><!-- /.box -->
                                    <div class="col-md-12">



                                        <!--SUPPCLIENT-->
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary supprimer" formaction=<?php $this->lien('client', 'delete') ?>>suprimer les clients selectionnÃ©s</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>

                            <!--  <div class="col-xs-12">-->
                            <div class="box"><!--NEW-->
                                <div class="box-header">
                                    <h3 class="box-title">Atribuer droit</h3>
                                </div>
                                <div class="box-body"><!--ATrIBUER Droit-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <label>utilisateur</label>
                                                <input class="form-control champ_ajout" type="text" placeholder="Enter ..."></input>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Droit :</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-navicon"></i>
                                                    </div><!--MENU DEROULANT-->
                                                    <select class="form-control">
                                                        <option>example1</option>
                                                        <option>example2</option>
                                                        <option>example3</option>
                                                    </select>
                                                </div><!-- /.input group -->

                                            </div><!-- /.form group -->
                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">

                                                <label>Client</label>
                                                <input class="form-control champ_ajout" type="text" placeholder="Enter ..."></input>

                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="row" id="atribuer">
                                                <div class="col-md-10">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="submit" class="btn btn-primary supprimer" >atribuer</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!--row-->
                                </div>
                            </div>


                            <!--LISTE USERS-->

                            <div class="col-xs-12">
=======
                          </div><!--/PARTIE 1-->

                                               <!-- Main content -->
                            <!--PARTIE 2-->
                          <div class="col-xs-12"> 
>>>>>>> Client
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Liste des Utilisateurs</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">


                                                <div id="example1_filter" class="dataTables_filter">
                                                    <label>
                                                        Chercher:
                                                        <input class="form-control input-sm champ_ajout" type="search" placeholder="" aria-controls="example1"></i></label>
                                                </div>

                                            </div>

                                            <div class="col-md-6">


                                                <!--aenlever <button type="submit" class="btn btn-primary">suprimer les clients selectionnÃ©s</button> -->

                                            </div>

                                        </div>

                                    </div>


                                    <div class="box-body">
                                        <!--TABLEAU-->


                                        <table id="example2" class="table table-bordered table-hover detail">
                                            <thead>
                                            <tr>
                                                <th>Identifiant</th>
                                                <th>Password</th>
                                                <th>Mail</th>
                                                <th>Select</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($users as $user) {
                                                ?>
                                                <tr>
                                                    <td><?= $user['identifiant'] ?></td>
                                                    <!--Nom-->
                                                    <td><?= $user['password'] ?></td>
                                                    <!--password-->
                                                    <td><?= '' ?></td>
                                                    <!--E-mail-->

                                                    <!--<td><input type="hidden" class="id" value="<?= $user['id'] ?>"></td>-->
                                                    <!--Select-->
                                                    <td><input type="checkbox" class="index champ_ajout" name="<?= $user['id'] ?>"/></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Identifiant</th>
                                                <th>Password</th>
                                                <th>Mail</th>
                                                <th>Select</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->

                                    <!--Supp User-->
                                </div>


                                <!--/LISTE USER-->

                                <div class="box-footer">


                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div id="example1_info" class="dataTables_info" role="status" aria-live="polite"></div>
                                        </div>
<<<<<<< HEAD
                                        <div class="col-sm-5">
                                            <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                    <li id="example1_previous" class="paginate_button previous disabled">

                                                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">

                                                            Precedente

                                                        </a>

                                                    </li>
                                                    <li class="paginate_button active">

                                                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">
                                                            1
                                                        </a>

                                                    </li>
                                                    <li class="paginate_button ">

                                                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">
                                                            2
                                                        </a>

                                                    </li>
                                                    <li class="paginate_button ">

                                                        <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">
                                                            3
                                                        </a>

                                                    </li>
                                                    <li class="paginate_button ">

                                                        <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">

                                                            4

                                                        </a>

                                                    </li>
                                                    <li class="paginate_button ">

                                                        <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">
                                                            5
                                                        </a>

                                                    </li>
                                                    <li class="paginate_button ">

                                                        <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">
                                                            6
                                                        </a>

                                                    </li>
                                                    <li id="example1_next" class="paginate_button next">

                                                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">

                                                            Suivante

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>

                                </div><!-- /.box-footer-->
                            </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    //Evenement valeur de .index => checkBox
    $('.index').change(function(){
=======
                                                <div class="box-body"><!--ATrIBUER Droit-->
                                                        <div class="row">
                                                                <div class="col-md-4">
                                                                                <div class="form-group">

                                                                                        <label>utilisateur</label>
                                                                                        <input class="form-control champ_ajout" type="text" placeholder="Enter ..."></input>

                                                                                </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="form-group">
                                                                                <label>Droit :</label>
                                                                                <div class="input-group">
                                                                                <div class="input-group-addon">
                                                                                <i class="fa fa-navicon"></i>
                                                                                </div><!--MENU DEROULANT-->
                                                                                <select class="form-control">
                                                                                        <option>example1</option>
                                                                                        <option>example2</option>
                                                                                        <option>example3</option>
                                                                                </select>
                                                                                </div><!-- /.input group -->

                                                                        </div><!-- /.form group -->
                                                                </div>

                                                                <div class="col-md-4">

                                                                                <div class="form-group">

                                                                                        <label>Client</label>
                                                                                        <input class="form-control champ_ajout" type="text" placeholder="Enter ..."></input>

                                                                                </div>

                                                                </div>

                                                                <div class="col-md-12">
                                                                                <div class="row" id="atribuer">
                                                                                        <div class="col-md-10">
                                                                                         </div>
                                                                                         <div class="col-md-1">
                                                                                           <button type="submit" class="btn btn-primary supprimer" >atribuer</button>
                                                                                         </div>
                                                                                </div>
                                                                </div>

                                                        </div><!--row-->
                                                </div>
                                </div>
                
          
            <!--LISTE USERS-->
            
            
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Liste des Utilisateurs</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    	<div class="col-md-6">
                    	
                
                           <div id="example1_filter" class="dataTables_filter">
                                   <label>
                                         Chercher:
                                     <input class="form-control input-sm champ_ajout" type="search" placeholder="" aria-controls="example1"></i></label>
                             </div>
                             
                         </div>
                         
                         <div class="col-md-6">
                    	
                
                          <!--aenlever <button type="submit" class="btn btn-primary">suprimer les clients selectionnÃ©s</button> -->
                                   
                             </div>
                             
                    </div>
                         
                </div>
                     
                     
                <div class="box-body">
                <!--TABLEAU-->
                
                  
                              <table id="example2" class="table table-bordered table-hover detail">
                                  <thead>
                                      <tr>
                                           <th>Identifiant</th>
                                           <th>Password</th>
                                          <th>Mail</th>
                                            <th>Select</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                          foreach ($users as $user) {
                                              ?>
                                              <tr>
                                                  <td><?= $user['identifiant'] ?></td>
                                                  <!--Nom-->
                                                  <td><?= $user['password'] ?></td>
                                                                                  <!--password-->
                                                  <td><?= '' ?></td>
                                                  <!--E-mail-->

                                                  <!--<td><input type="hidden" class="id" value="<?= $user['id'] ?>"></td>-->
                                                  <!--Select-->
                                                  <td><input type="checkbox" class="index champ_ajout" name="<?= $user['id'] ?>"/></td>
                                              </tr>
                                              <?php
                                          }
                                        ?>
                                </tbody>
                    <tfoot>
                      <tr>
                        <th>Identifiant</th>
                        <th>Password</th>
                        <th>Mail</th>							 
                        <th>Select</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                
                <!--Supp User--> 
              </div>
            
            
            <!--/LISTE USER-->

            <div class="box-footer">
              
              
                      <div class="row">
                        <div class="col-sm-7">
                            <div id="example1_info" class="dataTables_info" role="status" aria-live="polite"></div>
                        </div>
                        <div class="col-sm-5">
                            <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li id="example1_previous" class="paginate_button previous disabled">
                    
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">
                                        
                                                Precedente
                                        
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button active">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">
                                                1
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button ">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">
                                                2
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button ">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">
                                                3
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button ">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">
                                        
                                                4
                                        
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button ">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">                     
                                                5
                                            </a>
                                        
                                        </li>
                                        <li class="paginate_button ">
                                        
                                            <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">
                                                6
                                            </a>
                                        
                                        </li>
                                        <li id="example1_next" class="paginate_button next">
                    
                                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">
                    
                                            Suivante
                    
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                    
                    </div>

            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          <!--/PARTIE 2-->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script>
      //Evenement valeur de .index => checkBox
        $('.index').change(function(){
>>>>>>> Client
        //si cochÃ©
        if(this.checked){
            //on recupere le noeud parent tr avec la fonction closest 
            //on ajoute un class sans style pour la selection 
            $(this).closest('tr').addClass('aCacher') ;;
        }else{
            $(this).closest('tr').removeClass('aCacher') ;
        }

    });

    //Au click du bouton supprimer on cache l'element
    //a Mettre dans success: de la fonction ajax
    $('.supprimer').on('click',function(){
        //fadeOut plus esthetique que hide() , prend un parametre la vitresse de disparition
        //par defaut 400ms ;
        var tab = $('.aCacher').children();
        console.log(tab)
        $('.aCacher').fadeOut("slow");
    });
</script>
     
