<?php
// Projet Annuel - BTS Info - Site Inpact
// Fonction de la vue vues.html5/VueAnnuaireSites.php : visualiser la vue des pages externes et l'annuaire des sites utiles
// Ecrit le 06/11/2016 par Killian BOUTIN
// Modifié le 29/11/2016 par Killian BOUTIN
?>
<body>
	<div id="page">
		<header> <?php include ('Header.php'); ?> </header>
		
		<div id="mainEvenement">
		
			<?php foreach ($lesEvenements as $unEvenement){ ?>
			<a id="divCliquable" href="index.php?action=Evenements&id=<?php echo $unEvenement->getId() ?>">
				<div class="ui-evenement-titre">
					 <?php echo $unEvenement->getTitre() . " (du " . $unEvenement->getDateEvenement() . ")";?>
					 	
					 <br>
				</div>
				<div class="ui-evenement-evt">
					 <?php echo $unEvenement->getContenu(); ?>
					 <br>
				</div>
				<div class="ui-evenement-suite">
					<?php if (dateDiff($unEvenement->getDateEvenement()) == 0){
							echo '<p style="float: right;"> Aujourd\'hui <br></p>';
						}else{
					 		echo '<p style="float: right;"> J-' . dateDiff($unEvenement->getDateEvenement()). '<br></p>';
						} ?>
				</div>
			</a>
			<?php } ?>
		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>