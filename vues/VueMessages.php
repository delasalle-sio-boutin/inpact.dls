<?php
	// Projet Annuel - BTS Info - Site Inpact
	// Fonction de la vue vues.html5/VueConnecter.php : visualiser la vue de connexion
	// Ecrit le 06/11/2016 par Killian BOUTIN
	// Modifié le 29/11/2016 par Killian BOUTIN
?>
<body>
	<div id="page">
    <header> <?php include ('Header.php'); ?> </header>
	<div id="page-contenu">
	
		<div id="page-contenu-head">
			<ul id="menu-horizontal">
				<li>Messages privés<?php if ($titre != '') echo " | " . $titre ?></li>
			</ul>
		</div>
		
		<div id="page-contenu-body">
			<p>Ceci est un test</p>
		</div>
		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>