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
			<li><a href="index.php?action=Frames&id=facebook">Facebook</a></li>
			<!-- <li><a href="index.php?action=Frames&id=twitter">Twitter</a></li>
			<li><a href="index.php?action=Frames&id=facebook">LinkedIn</a></li> -->
		    <li><a href="index.php?action=Frames&id=scolinfo">Scolinfo</a></li>
		</ul>
		<?php
		if (isset($_GET["id"])){
			if (($_GET["id"] == "scolinfo") || (empty($_GET["id"]))){?>
				<IFRAME src="https://www.scolinfo.net/" width=100%; height=100%; scrolling=auto frameborder=1 > </IFRAME>
			<?php }else{ 
					if ($_GET["id"] == "facebook"){
				?>
				<div style="text-align: center;">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FInpactdls%2F&tabs=timeline&width=500&height=400&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="500" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
			<?php }
			} ?>
		<?php }else{ ?>
		
			<IFRAME src="https://www.scolinfo.net/" width=100%; height=100%; scrolling=auto frameborder=1 > </IFRAME>
		<?php }?>
	</div>
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
    <footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
  </div>
</body>