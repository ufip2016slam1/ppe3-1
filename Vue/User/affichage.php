<?php $this->titre = "utilisateurs"?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Utilisateurs
            
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- box contenu-->
          <div class="box">
            
            <div class="box-body">
                <div class="content">
                    <div class="row"> <!--ROW PRINCIPALCONTENT-->
                    <!-- Main content -->
                        <div class="col-xs-12">
                            
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Liste des utilisateurs</h3>
                                
                              </div><!-- /.box-header -->
                              <div class="box-body"><!--RECHERCHEBOITE-->
                                      <div class="row">
                                          <div class="col-md-6">


                                              <div id="example1_filter" class="dataTables_filter">
                                                  <label>Chercher:<input class="form-control input-sm" type="search" placeholder="" aria-controls="example1"></i></label>
                                               </div>

                                          </div>

                                          <div class="col-md-6"><!--ESPACE apres recherche-->

                                          </div>

                                      </div>

                              </div><!--/RECHERCHEBOITE-->

                                   <!--SUPP-->

                              <!--TABLEAU-->

                              <table id="example2" class="table table-bordered table-hover detail">
                                  <thead>
                                      <tr>
                                           <th>Identifiant</th>
                                          <th>Select</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      foreach ($users as $user) {
                                          ?>
                                          <tr>
                                              <!--identifiant-->
                                              <td id="identifiant" name="identifiant"><?= $user['identifiant'] ?></td>
                                              <!--Select-->
                                              <td><input type="checkbox" class="index" name="<?= $user['id_user'] ?>"/></td>
                                          </tr>
                                          <?php
                                      }
                                    ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>Identifiant</th>
                                          <th>Select</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div><!-- /.box-body -->                                       
                        </div><!-- /.box -->
                    </div><!-- /.col --><!--ROW PRINCIPALCONTENT-->


                
              <!--SUPPRIMER USER-->
                <div class="row" id="supp_user">
                    	<div class="col-md-9">
                         </div>
                         <div class="col-md-2">
                           <button type="submit" class="btn btn-primary supprimer" formaction=<?php $this->lien('user', 'delete') ?>>suprimer les utilisateurs selectionnés</button>
                             </div>
                </div>
                </div><!-- /.boxBody- -->
            </div><!-- /.box- -->
            
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