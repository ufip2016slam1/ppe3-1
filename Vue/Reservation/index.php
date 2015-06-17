<?php
    $this->titre = "accueil" ;
    $this->addCSS = '<link href="Contenu/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />';
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
		           <option value="salle1">Salle 1</option>
		           <option value="salle 2">Salle 2</option>
		           <option value="salle 3">Salle 3</option>
		           <option value="salle 4">Salle 4</option>          
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