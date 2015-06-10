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
            <div class="box-header with-border">
             
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="content">
				<div class="row">
					<section class="content">
          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Ajouter un Client</h3>
                </div>
                <div class="box-body">
                	<form action="" method="post"><!--GAUTIER-->
                
                              <!-- NOM -->
                              <div class="form-group">
                                <label>Nom:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- PRENOM -->
                              <div class="form-group">
                                <label>Prenom:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- TELEPHONE -->
                              <div class="form-group">
                                <label>Telephone:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- Raison sociale -->
                              <div class="form-group">
                                <label>Raison sociale:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
            
                              <!-- Adresse -->
                              <div class="form-group">
                                <label>Adresse:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
                              
                              <!-- Code postal -->
                              <div class="form-group">
                                <label>Code postal:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
                              
                              <!-- Ville -->
                              <div class="form-group">
                                <label>Ville:</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                  </div>
                                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask/>
                                </div><!-- /.input group -->
                              </div><!-- /.form group -->
                              
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Ajouter</button> 
                     </form>
                     
                     <!--FIN FORM-->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
				
				</div>
				
				 <!-- Main content -->
       
            <div class="col-xs-12">
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
                                     <input class="form-control input-sm" type="search" placeholder="" aria-controls="example1"></i></label>
                             </div>
                             
                         </div>
                         
                         <div class="col-md-6">
                    	
                
                          <!--aenlever <button type="submit" class="btn btn-primary">suprimer les clients selectionnés</button> -->
                                   
                             </div>
                             
                         </div>
                         
                	</div>
                     
                     <!--SUPP-->
                
                <!--TABLEAU-->
                
                  <table id="example2" class="table table-bordered table-hover">
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
                      <tr>
                        <td>aaa</td><!--Nom-->
                        <td>aaa</td><!--Prenom-->
                        <td>aaa</td><!--Raison sociale-->
                        <td>aaa</td><!--Adresse-->
                        <td>aaa</td><!--E-mail-->
                        <td>aaa</td><!--Code postal-->
						<td>aaa</td><!--Ville-->
						<td>aaa</td><!--Telephone-->
                        <td>aaa</td><!--Select-->
                        <td><input type="checkbox"/></td>
                      </tr>
					  
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			  
			  
			  </div>
              <!--SUPPCLIENT-->
               <div class="row">
                    	<div class="col-md-9">
                         </div>
                         <div class="col-md-2">
                           <button type="submit" class="btn btn-primary">suprimer les clients selectionnés</button> 
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
                                        
                                                Previous
                                        
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
                    
                                            Next
                    
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