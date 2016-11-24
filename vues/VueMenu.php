<?php 
// Projet Annuel - Site Inpact
// Fonction de la vue VueMenu.php : affiche la vue d'accueil
// Ecrit le 18/11/2016 par Killian BOUTIN
// Modifié le 20/11/2016 par Killian BOUTIN

// Cette vue affiche les données principales du site avec un fil twitter
?>
<!doctype html>
<html lang="fr">
	<header> <?php include ('Header.php'); ?> </header>
	
	<body>
		<div id="page-accueil">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ui-accueil-content">
			
			<?php 
			$i = 1;
			foreach ($lesEvenements as $unEvenement){ ?>
				<div class="col-sm-5 ui-accueil-actu <?php echo ${'uneClass'.$i} ?>">
					<div class="ui-accueil-evt">
						<b><?php echo ${'$unTitre'.$i} . "<br>";?></b>
						<?php echo ${'$unContenu'.$i}; ?>
					</div>
					<div class="ui-accueil-suite">
						<a href="index.php?action=Evenements">Lire la suite (...)</a>
					</div>
				</div>
			<?php 
			$i += 1; } ?>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ui-fil-twitter">
				<a class="twitter-timeline" data-lang="fr" data-dnt="true" data-height="650" data-theme="dark" data-link-color="#f5b570" href="https://twitter.com/TiboisLoL/lists/inpact">A Twitter List by TiboisLoL</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
	</body>
	
	<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
</html>