<?php
// Projet Annuel - BTS Info - Site Inpact
// Fonction de la vue vues.html5/VueAnnuaireSites.php : visualiser la vue des pages externes et l'annuaire des sites utiles
// Ecrit le 06/11/2016 par Killian BOUTIN
// Modifié le 29/11/2016 par Killian BOUTIN
?>
<body>
	<div id="page">
		<header> <?php include ('Header.php'); ?> </header>
		
		<div id="main">
			<?php foreach ($lesEvenements as $unEvenement){ ?>
			 <?php echo '<a href="index.php?action=Evenements&id='. $unEvenement->getId() . '">' ?>
				<div class="ui-evenement-actu" style="border: 1px solid;">
					<div class="ui-evenement-titre">
						 <b><?php echo $unEvenement->getTitre() . "<br>";?></b>
					</div>
					<div class="ui-evenement-evt">
						 <?php echo $unEvenement->getContenu(); ?>
					</div>
					<div class="ui-evenement-suite">
					</div>
				</div>
			</a>
			<?php } ?>




		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>