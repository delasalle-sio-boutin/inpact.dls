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
				<li>Accéder à mon compte</li>
			</ul>
		</div>
		
		<div id="page-contenu-body">
			<form name="form1" id="form1" action="index.php?action=Connecter" method="post">
				<table>
					<b><p style="text-align: center;"><?php echo $message; ?></p></b>
					<tr>
						<td><label for="txtLogin" style ="margin: 7px;">Login :</label></td>
						<td><input type="text" name="txtLogin" id="txtLogin" maxlength="50" placeholder="Mon login" required value="<?php echo $login; ?>" ></td>
					</tr>
					<tr>
						<td><label for="txtMotDePasse" style ="margin: 7px;">Password :</label></td>
						<td><input type="password" name="txtMdp" id="txtMdp" maxlength="50" placeholder="Mon mot de passe" required value="<?php echo $mdp; ?>" ></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="btnConnecter" id="btnConnecter" value="Me connecter">
						</td>
					</tr>
				</table>
			</form>
		</div>
		</div>
		<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
</body>