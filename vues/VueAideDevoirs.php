<?php
	// Projet Annuel - BTS Info - Site Inpact
	// Fonction de la vue vues.html5/VueAnnuaireSites.php : visualiser la vue des pages externes et l'annuaire des sites utiles
	// Ecrit le 06/11/2016 par Sophie Audigou
	// Modifié le 03/03/2017 par Sophie Audigou
?>
<body>
  <div id="page">
    <header> <?php include ('Header.php'); ?> </header>
    <div id="main">
		<?php
		
			echo'<i>Retour page d accueil: </i><a href ="./index.php">Accueil</a>';
		
		?>
		<h1>Aides aux devoirs</h1>
		<?php 
		
		
	 	foreach ($lesAideDevoirs as $uneAideDevoirs){ ?>
	 					
	 						
	 							 <?php echo $uneAideDevoirs->getTitre() ; ?> </br>
	 							  <?php echo $uneAideDevoirs->getContenu(); ?> </br>
	 							 <?php echo  $uneAideDevoirs->getDateCreation();
	 							
	 							 if ($uneAideDevoir->getId() == $lesReponsesAideDevoirs->getIdAideDevoir()) 
	 							 { 
	 							 
	 							 foreach ($lesReponsesAideDevoirs as $uneReponseAideDevoirs){ ?>
	 							 
	 							 <?php echo $uneReponseAideDevoirs -> getReponse();}
	 							 
	 							 
	 							 } else 
	 							 	
	 							 {}
	 							 ?>
	 							 	
	 							 	
	 							
	 							 
	 							  </br> 
	 							 
	 							 
	 							 
	 							 </br> <?php } 

									 ?> 
	 					
	 	
	 	
	</div>
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
    <footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
  </div>
</body>