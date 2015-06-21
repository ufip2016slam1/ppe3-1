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

		<div id="nouvelle_reservation" title="Faire une reservation ">
		  <p class="validation">Tous les champs </p>
		 
		  <form>
		    <p>
		   		reservation faite par <span class="nom"></span>
		   		<br>
		   		Le <span class="now"><span>
		   	</p>
		      <br>
		      <label for="title">Quelle Salle Souhaitez vous reserver : </label><br />
		       <select name="title" id="title">
		       	<?php
                    foreach ($salles as $salle) { ?>
						<option value="<?= $salle['nom_salle'] ?>"><?= $salle['nom_salle'] ?></option>
						<?php
                     }
                ?>
      
		       </select>

		       <label for="title">Pour quelle ligue souhaitez vous reverver : </label><br />
		       <select name="title" id="title">
		       	<?php
                    foreach ($salles as $salle) { ?>
						<option value="<?= $salle['nom_salle'] ?>"><?= $salle['nom_salle'] ?></option>
						<?php
                     }
                ?>
      
		       </select>
		      <br>
		      
		      date de la reservation : <span class="date_reserv" style="text-decoration:underline"></span>
		      <br>
		      heure du debut de la reservation 
		      <br>
		      <input type="numeric" name="heureDebut" id="heureDebut" width="10px" size="2">:
		      <input type="numeric" name="minuteDebut" id="minuteDebut" width="10px" size="2">
		      <br>
		      heure du fin de la reservation 
		      <br>
		      <input type="numeric" name="heureFin" id="heureFin" width="10px" size="2">:
		      <input type="numeric" name="minuteFin" id="minuteFin" width="10px" size="2">

		      
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