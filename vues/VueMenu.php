<?php 
// Projet Annuel - Site Inpact
// Fonction de la vue VueMenu.php : affiche la vue d'accueil
// Ecrit le 18/11/2016 par Killian BOUTIN
// Modifié le 20/11/2016 par Killian BOUTIN

// Cette vue affiche les données principales du site avec un fil twitter
?>

<header> <?php include ('Header.php'); ?> </header>

<body>
	<div id="page">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="col-lg-12">
				Div une
			</div>
			<div class="col-lg-12">
				Div deux
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ui-fil-twitter">
			<a class="twitter-timeline" data-lang="fr" data-dnt="true" data-height="650" data-theme="dark" data-link-color="#f5b570" href="https://twitter.com/TiboisLoL/lists/inpact">A Twitter List by TiboisLoL</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			<br><br><br>
		</div>
	</div>
</body>

<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>