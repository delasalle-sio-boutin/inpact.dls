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
		<ul class="ui-externes">
		    <li><a href="index.php?action=TermesConditions&id=scolinfo">Scolinfo</a></li>
		    <li><a href="index.php?action=TermesConditions&id=facebook">Portfolio</a></li>
		    <li><a href="#3">News</a></li>
		    <li><a href="#4">Labs</a></li>
		    <li><a href="#5">Contact</a></li>
		</ul>
		<?php
		if (isset($_GET["id"])){
			if (($_GET["id"] == "scolinfo") || (empty($_GET["id"]))){?>
				<IFRAME src="https://www.scolinfo.net/" width=100%; height=100%; scrolling=auto frameborder=1 > </IFRAME>
			<?php }else{ ?>
				<p> les autres pages </p>
			<?php } ?>
		<?php }else{ ?>
			<IFRAME src="https://www.scolinfo.net/" width=100%; height=100%; scrolling=auto frameborder=1 > </IFRAME>
		<?php }?>
	</div>
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
    <footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
  </div>
</body>