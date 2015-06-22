
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            salle

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
                            <!--FORMULAIRE--><!--RIPF-->
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="box box-danger">
                                        <div class="box-header">
                                            <h3 class="box-title">ajouter salle</h3>
                                        </div>
                                        <div class="box-body">
                                            <form action="<?php $this->lien('salle', 'add') ?>" method="post" class="insertion"><!--GAUTIER--><!--DEBUT FORM--><!--RIP-->

                                                <!-- Nom salle -->
                                                <div class="form-group">
                                                    <label>Nom salle :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square-o"></i>
                                                        </div>
                                                        <input type="text" class="form-control champ_ajout" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="nom_salle"/>
                                                    </div><!-- /.input group -->
                                                </div><!-- /.form group -->

                                                <!-- Categorie -->
                                                <div class="form-group">
                                                    <label>Categorie :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-navicon"></i>
                                                        </div><!--MENU DEROULANT-->
                                                        <select class="form-control champ_ajout" name="categorie">
                                                            <?php
                                                            $i = 0 ;
                                                            foreach ($categories as $categorie){

                                                                $i++ ; 
                                                                ?>
                                                                <option value="<?= $categorie ?>"<?php if($i==1) echo 'selected'?> ><?= $categorie ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div><!-- /.input group -->

                                                </div><!-- /.form group -->


                                                <!-- T1 -->
                                                <div class="form-group">
                                                    <label>Tarif 1 :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square-o"></i>
                                                        </div>
                                                        <input type="text" class="form-control champ_ajout" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="t1"/>
                                                    </div><!-- /.input group -->
                                                </div><!-- /.form group -->
                                                <!-- T2 -->
                                                <div class="form-group">
                                                    <label>Tarif 2 :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square-o"></i>
                                                        </div>
                                                        <input type="text" class="form-control champ_ajout" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="t2"/>
                                                    </div><!-- /.input group -->
                                                </div><!-- /.form group -->
                                                <!-- T3 -->
                                                <div class="form-group">
                                                    <label>Tarif 3 :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-square-o"></i>
                                                        </div>
                                                        <input type="text" class="form-control champ_ajout" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="t3"/>
                                                    </div><!-- /.input group -->
                                                </div><!-- /.form group -->

                                                
                                                <button type="submit" class="btn btn-primary btn-block btn-flat ajouter">Ajouter</button>

                                            </form>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->

                                </div>

                                <!-- Main content -->

                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Liste des salles</h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <!--RECHERCHER-->

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Rechercher :</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <a href="#"><i class="fa fa-search"></i></a>
                                                            </div>
                                                            <input type="text" class="form-control input-sm" type="search" placeholder="" />
                                                        </div><!-- /.input group -->
                                                    </div><!-- /.form group -->
                                                </div>

                                                <div class="col-md-6">
                                                    <!--aenlever <button type="submit" class="btn btn-primary">suprimer les clients selectionnés</button> -->
                                                </div>
                                            </div>
                                        </div>

                                        <!--RECHERCHERFIN-->
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>

                                                <th>Nom salle</th>
                                                <th>Categorie</th>
                                                <th>Tarif 1</th>
                                                <th>Tarif 2</th>
                                                <th>Tarif 3</th>
                                                <th>Select</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php
                                                foreach ($salles as $salle) {
                                                ?>
                                            <tr>
                                                <td><?= $salle['nom'] ?></td>
                                                <td><?= $salle['categorie'] ?></td>
                                                <td><?= $salle['t1'] ?></td>
                                                <td><?= $salle['t2'] ?></td>
                                                <td><?= $salle['t3'] ?></td>
                                                <!--Select-->
                                                <td><input type="checkbox" class="index"/></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tr>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Nom salle</th>
                                                <th>Categorie</th>
                                                <th>Tarif 1</th>
                                                <th>Tarif 2</th>
                                                <th>Tarif 3</th>
                                                <th>Select</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->


                    </div>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">suprimer les salles selectionnées</button>
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