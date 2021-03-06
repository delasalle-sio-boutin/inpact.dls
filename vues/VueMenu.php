<?php 
// Projet Annuel - Site Inpact
// Fonction de la vue VueMenu.php : affiche la vue d'accueil
// Ecrit le 18/11/2016 par Killian BOUTIN
// Modifié le 20/11/2016 par Killian BOUTIN

// Cette vue affiche les données principales du site avec un fil twitter
?>

	<body>
		<div id="page">
			<header> <?php include ('Header.php'); ?> </header>
			<div id="main">
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ui-accueil-content">
				<?php 
				if (!empty ($lesEvenements)){
					for ($i = 0; $i <= $nbAffichage-1; $i++){
						${'unCompteARebours'.$i} = (${'unCompteARebours'.$i} != 0) ? "J-" . ${'unCompteARebours'.$i} : "Aujourd'hui";
						?>
						<div class="col-sm-6 ui-accueil-actu <?php echo ${'uneClass'.$i} ?>">
							<div class="ui-accueil-evt">
								<b><?php echo ${'unTitre'.$i} . " (du " . ${'uneDateEvenement'.$i} . ")";?>
								<p style="float: right"><?php echo ${'unCompteARebours'.$i} . "<br>" ?></p></b>
								<br>
								<?php echo ${'unContenu'.$i}; ?>
							</div>
							<div class="ui-accueil-suite">
								<a href="index.php?action=Evenements&id=<?php echo ${'unId'.$i} ?>">Lire la suite (...)</a>
								<p style="float: right">Publié le <?php echo ${'uneDateCreation'.$i} ?></p>
							</div>
						</div>
					<?php 
					}
				}?>
				</div>
				<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0 col-md-3 col-lg-3 ui-fil-twitter">
					<a class="twitter-timeline" data-lang="fr" data-dnt="true" data-height="650" data-theme="dark" data-link-color="#f5b570" href="https://twitter.com/DLS_SIO/lists/tweets-dls-rennes?lang=fr">A Twitter List by DLS_SIO</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</div>
			<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
		</div>
	</body>