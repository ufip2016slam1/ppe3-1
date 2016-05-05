<?php
    $this->titre = "reservation" ;
    $this->addCSS = '
		<link href="Contenu/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
		<link href="Contenu/plugins/fullcalendar/jqueryUi/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	';
	$this->addJS = '
		<script src="Contenu/plugins/fullcalendar/jqueryUi/jquery-ui.min.js"></script>
		<script src="Contenu/plugins/fullcalendar/lib/moment.min.js"></script>
		<script src="Contenu/plugins/fullcalendar/fullcalendar.js"></script>
		<script src="Contenu/plugins/fullcalendar/lang/fr.js"></script>
		<script src="Contenu/plugins/fullcalendar/calendrier.js"></script>
	';
?>
<!--bloc nouvelle reservation -->

 <div class="content-wrapper">

       <!-- Content Header (Page header) -->
       <section class="content-header">

		<div id="nouvelle_reservation" title="Reservation pour le <span class='date_reserv'>">
		  <p class="validation"></p>


			<form class="form-horizontal" class="">
				<fieldset>

				<!-- Form Name -->
					<legend><span>
						reservation faite par <span class='nom'><?= User::getById($_SESSION['id_user'])->getIdentifiant() ?></span>
					</legend>
					<div class="text-center"> 
						<!-- Select Basic -->
						<div class="form-group">
							<label class="control-label" for="selectbasic">Salle a réserver  : </label>
							<div class="">
								<select id="title" name="title" class="form-control">
									<?php
			                    foreach ($salles as $salle) { ?>
									<option value="<?= $salle['nom_salle'] ?>"><?= $salle['nom_salle'] ?></option>
									<?php
			                     }
			                ?>
								</select>
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="control-label" for="selectbasic">Ligue concernée :</label>
							<div class="">
								<select id="ligue" name="ligue" class="form-control">
										<?php
								if($clients)
									foreach ($clients as $client) { ?>
										<option value="<?= $client['id'] ?>"><?= $client['nom'] ?></option>
										<?php
									 }
			                ?>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textinput">De </label>  
							<div class="col-md-2">
								<input type="numeric" id="heureDebut" name="heureDebut" placeholder="HH" class="form-control input-md">
								<span class="help-block">HH</span>
							</div>
							<label class="col-md-1 control-label" for="textinput">:</label>  
							<div class="col-md-2">
								<input type="numeric"  id="minuteDebut" name="minuteDebut" placeholder="" class="form-control input-md">
								<span class="help-block">mm</span>  
							</div>
							
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textinput">A </label>  
							<div class="col-md-2">
								<input type="numeric" id="heureFin" name="heureFin" placeholder="HH" class="form-control input-md">
								<span class="help-block">HH</span>
							</div>
							<label class="col-md-1 control-label" for="textinput">:</label>  
							<div class="col-md-2">
								<input type="numeric"  id="minuteFin" name="minuteFin" placeholder="" class="form-control input-md">
								<span class="help-block">mm</span>  
							</div>
							
						</div>
					</div>
				</fieldset>
			</form>
		</div>

		<div id="reservation" title="Votre reservation ">
		 
		  reservation faite par <span class="nom"></span>
		  <br>
		  Le <span class="now"><span>
		    
		  <br>
		     
		  date de la reservation : <span class="date_reserv" style="text-decoration:underline"></span>
		  <br>
		  heure du debut de la reservation <span id="debut_reservation"></span>
		  <br>
		  heure du fin de la reservation <span id="fin_reservation"></span>
		  <br>
		      
		 
		</div>



		<div id="calendrier"></div>
	</section>

</div>