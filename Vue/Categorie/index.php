<?php
    $this->titre = "ajouter categorie";
?>


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
              <div class="content">
				<div class="row">
					<section class="content">
          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Ajouter une catégorie</h3>
                </div>
                <div class="box-body">
                	<form action="<?php $this->lien('categorie','add') ?>" method="post" class="insertion"><!--GAUTIER-->
                
                              <!-- NOM SALLE -->
                              <div class="form-group">
                                <label>Nom de categorie:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </div>
                                  <input type="text" class="form-control champ_ajout" name="nom_categorie"/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- Dbt réservation -->
                              <div class="form-group">
                                <label>Début réservation:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control champ_ajout" name="horaire_dbt"/>
                   				 </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- Fin reservation -->
                              <div class="form-group">
                                <label>Fin reservation:</label>
                                <div class="input-group">
                      				<div class="input-group-addon">
                       				 	<i class="fa fa-clock-o"></i>
                     				 </div>
                      				<input type="text" class="form-control champ_ajout" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="horaire_fin"/>
                   				 </div><!-- /.input group -->
                              </div><!-- /.form group -->

                          <button type="submit" submit="" class="btn btn-primary btn-block btn-flat ajouter">Ajouter</button>
                     </form>
                     
                     <!--FIN FORM-->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
				
				</div>
				
				 <!-- Main content -->
       
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Liste des categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<div class="row">
                    	<div class="col-md-6">
                    	
                
                           <div id="example1_filter" class="dataTables_filter">
                                   <label>
                                         Chercher:
                                     <input class="form-control input-sm" type="search" placeholder="" aria-controls="example1"></i></label>
                             </div>
                             
                         </div>
                         
                         <div class="col-md-6">
                    	
                             </div>
                             
                         </div>
                         
                	</div>
                     
                     <!--SUPP-->
                
                <!--TABLEAU-->
                
                  <table id="example2" class="table table-bordered table-hover detail">
                    <thead>
                      <tr>
                        <th>Nom categorie</th>
                        <th>Dbt reservation</th>
                        <th>Fin reservation</th>
                        <th>Select</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($categories as $categorie) {
                            ?>
                            <tr>
                                <td><?= $categorie['nom'] ?></td>
                                <!--Nom-->
                                <td><?= $categorie['horaire_dbt'] ?></td>
                                <!--Prenom-->
                                <td><?= $categorie['horaire_fin'] ?></td>
                                
                               
                                <!--Select-->
                                <td><input type="checkbox" class="index" name="<?= $categorie['id'] ?>"/></td>
                            </tr>
                            <?php
                        }
                      ?>
					</tbody>
                    <tfoot>
                      <tr>
                        <th>Nom categorie</th>
                        <th>Dbt reservation</th>
                        <th>Fin reservation/th>
                        <th>Adresse</th>
                        <th>Select</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			  
			  
			  </div>
              <!--SUPPCLIENT-->
               <div class="row">
                    	<div class="col-md-9">
                         </div>
                         <div class="col-md-2">
                           <button type="submit" class="btn btn-primary supprimer" formaction=<?php $this->lien('categorie', 'delete') ?>>suprimer les categories selectionnés</button>
                             </div>
                         </div>
                	</div>
            </div><!-- /.box-body -->
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

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->