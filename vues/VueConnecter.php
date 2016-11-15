<?php
	// Projet DLS - BTS Info - Anciens élèves
	// Fonction de la vue vues.html5/VueConnecter.php : visualiser la vue de connexion
	// Ecrit le 6/1/2016 par Jim
	// Modifié le 22/5/2016 par Jim
?>
<!doctype html>
<html>
<head>	
	<?php include_once ('Header.php'); ?>
</head> 
<body>
	<div id="page-contenu">
	
		<div id="page-contenu-head">
			<ul id="menu-horizontal">
				<li>Accéder à mon compte</li>
			</ul>
		</div>
		
		<div id="page-contenu-body">
			<form name="form1" id="form1" action="index.php?action=Connecter" method="post">
				<table>
					<tr>
						<td><label for="txtLogin" style ="margin: 7px;">Login :</label></td>
						<td><input type="text" name="txtLogin" id="txtLogin" maxlength="50" placeholder="Mon login" required value="<?php echo $login; ?>" ></td>
					</tr>
					<tr>
						<td><label for="txtMotDePasse" style ="margin: 7px;">Password :</label></td>
						<td><input type="password" name="txtMotDePasse" id="txtMotDePasse" maxlength="50" placeholder="Mon mot de passe" required value="<?php echo $motDePasse; ?>" ></td>
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
</body>
</html>