//fonction de chargement de jQuery 
$(document).ready(function() {


	//on recupere la date de la reservation ( l'heure actuelle )
	var date = new Date ();

	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	//date ou la reservation est faite
	// m+1 <=> janvier = 0 ;
	var date_jour = y+'-'+(m+1)+'-'+d ; 
	//date de la reservation 
	var date_reserv ='2015-06-18';

	function remplirDialog(start){

		/**
		*
		* Afin de recuperer l'heure de debut et de fin 
		* $('.fc-time:last') <=> au rectangle bleu creer a la selection 
		* 
		*
		* @variable horaires Chaine de caracteres au format "00:00 - 00:00"
		* avec heure de debut / heure de fin 
		* 
		* @variable debut decoupe horaire afin de recuperer la 5 premiers caracteres 
		* @variable fin decoupe horaire afin de recuperer la 5 derniers caracteres 
		*
		**/

		//On concateneur 
		//date_reserv = start._i[0]+'-'+(start._i[1]+1)+'-'+start._i[2] ;

		var horaires = $('.fc-time:last').attr('data-full');

		if(!horaires){
			//Horaire par default
			horaires = '07:30 - 22:30';
		}
		//on separare la chaine horaire
		//on recupere les 5 premiers caracteres
		//format chaine = HH:mm
		//console.log(horaires)
		var debut = horaires.substr(0,5) ;
		//On recupere les 5 derniers caracteres 
		var fin = horaires.substr(8,5) ; 

		//console.log('horaire : '+horaires)

				

		//on recupere les heures de l'heure de debut et de fin 
		//format HH
		var debutHeure = debut.substr(0,2) ;
		var finHeure = fin.substr(0,2) ;
		//on recupere les minutes de l'heure de debut et de fin 
		//format mm
		var debutMinute = debut.substr(3,2) ;
		var finMinute = fin.substr(3,2) ;

		//On attribut les valeurs aux champs correspondant 
		$('.date_reserv').html(date_reserv);
		$('#heureDebut').val(debutHeure) ;
		$('#minuteDebut').val(debutMinute) ;
		$('#heureFin').val(finHeure) ;
		$('#minuteFin').val(finMinute) ;
		//En attente de recuperer la date de la bdd
		//Puisque c'est celle ci qui sera ajouter lors d'ajout de reservation 
		$('.now').html(date_jour);
	}
   		

	/**
   	* Mise en place de la boite de dialogue qui s'ouvrira en cas de reservation 
   	*
   	**/
   	var dialogReservation = $( "#reservation" ).dialog({
   		autoOpen: false,
		height: 500,
		width: 550,
		modal: false,

		buttons: {

			'fermer': function() {
				$(this).dialog( "close" );
			}
		}

   	}) ; 
	var dialog = $( "#nouvelle_reservation" ).dialog({
		autoOpen: false,
		height: 500,
		width: 550,
		modal: false,
		open : function(){
			//fonction a l'ouverture de la boite dialog
			open: remplirDialog() ; 
		},
	

		buttons: {

			/**
			*
			* Pour ajouter un boutton quelque soit le nom 
			* MODEL 
			* 'nomDuBoutton': function(){
			*		Votre code ... 
			* }
			*
			**/
			
			'annuler': function() {
				//Ferme la boite de dialog
				$(this).dialog( "close" );
			},
			"reserver" : function(){
				date_reserv = $('.date_reserv:first').text();
				//console.log("date_reserv"+date_reserv) ;

				//On recupere la salle de la reservation
				var title = $('#title').val() ; 
				//On recupere la date et l'heure en fonction des valeurs des inputs
				var start = date_reserv+' '+$('#heureDebut').val()+':'+$('#minuteDebut').val()+':00' ; 
				var end = date_reserv+' '+$('#heureFin').val()+':'+$('#minuteFin').val()+':00' ;
				

				$.ajax({ 
					'url': '?controleur=reservation&action=add',  //page ou controler appellé
					'type': 'POST', //mothode
						
					'data': { //les données
						'date_dbt': start, 
						'date_fin': end,
						'nom_salle':title
						//'date_reserv' : date_reserv
					} , 
					success : function() {

						//console.log('ajax ok ');
						/**
						*
						* On appelle la function renderEvert qui va permettre de fixer la nouvelle reservation sans rechargement 
						* title , start , end sont nommées par fullCalendar 
						* a respecter 
						*
						**/
						$('#calendrier').fullCalendar('renderEvent',{
							title: title,
							start: start,
							end: end,
							allDay: false
							},
							true // permet de "fixer" l'element sans rechargement du calendrier 
						);

						//Console log des informations qui ont été envoyées  
						//console.log(title)
						//console.log(start)
						//console.log(end)
				}

				});
				//On ferme la boite de dialog reservation 		
				$(this).dialog( "close" );
			}
		}
		
	});

	var test ;
	//on transforme notre simple div en calendrier


	var calendrier = $('#calendrier').fullCalendar({
		header: {
			left:   'today prev,next',
			center: 'title',
			right:   'month,agendaWeek,agendaDay'
		},

		events: "?controleur=reservation&action=ajaxGetReserv",
			
		selectable: true,
		selectHelper: true,
		allDayDefault: false ,

		//evenement au click sur une date
		dayClick : function(calEvent, jsEvent, date,view) {
			console.log(calEvent);

		//On verifie si on est sur le l'affichage mois 
		//Au click on ouvre la journée 
		//sinon rien 

		//dialog.dialog('open');


		/**
		*
		* On replie la boite de dialogue avec les informations de User 
		*
		* @variable d int jour 
		* @variable m int Mois 
		* @variable y int Annee (AAAA)
		* var date = new Date (); 
		*
		**/
			 
		//date_reserv = ($(this).attr('data-date'));
		/*test = date_reserv ; 
		$('.nom').html('Bryann') ; 
		$('.now').html(''+d+'/'+m+'/'+y+'');
		$('.date_reserv').html(date_reserv);
		*/
		},
		eventClick: function(calEvent, jsEvent, view) { 
			console.log(calEvent) ;
			console.log('code de la reservation :'+calEvent.id)
			console.log('reservation du :'+calEvent._start._i)

			dialogReservation.dialog('open');
			//console.log('reservation du :'+calEvent._end._i)
						
		
		},

		//selectionner l'heure du renctangle bleu 
		select: function(start){ 
			

			/*
			*	jour = start._i[2] ; 
			*	mois = start._i[1]+1 ; 
			*	année = start._i[0] ; 
			*
			*	On concatene 
			*	date_reserv = AAAA-MM-JJ
			**/
			date_reserv = start._i[0]+'-'+(start._i[1]+1)+'-'+start._i[2] ;
			/*
			remplacer par la fonction remplirDialog() afin d'eviter la recurrence 
			var horaires = $('.fc-time:last').attr('data-full'); 
			var debut = horaires.substr(0,5) ;
			var debut = horaires.substr(0,5) ;
			var debutHeure = debut.substr(0,2) ;
			var debutMinute = debut.substr(3,2) ;
			var fin = horaires.substr(8,5) ; 
			var finHeure = fin.substr(0,2) ;
			var finMinute = fin.substr(3,2) ;
			*/
			remplirDialog(start) ;
			dialog.dialog('open') ; 

			/*
			$('.date_reserv').html(date_reserv);
			$('#heureDebut').val(debutHeure) ;
			$('#minuteDebut').val(debutMinute) ;
			$('#heureFin').val(finHeure) ;
			$('#minuteFin').val(finMinute) ;
			*/

		}
			
	});
	
});