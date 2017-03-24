<?php
// Projet Annuel - Site Inpact
// Fonction de la vue VueGererEvenements.php : affiche la vue permettant de gerer les évenements
// Ecrit le 24/03/2017 par Florentin GREMY
// Modifié le 24/03/2017 par Florentin GREMY
?>
<body>
	<div id="page">
		<header> <?php include ('Header.php'); ?> </header>
		
		<?php if (isset($_GET['choix'])) {
			$choix = $_GET['choix'];
			if ($choix == 'creer') {
				?> <div class="row">
                       	<div class="col-md-6">
                             <div class="form-group">
                                <label for="form_name">Nom</label>
                                <input id="form_name" type="text" name="txtNom" class="form-control" value="<?php echo /*$unNom*/ "Nom" ; ?>" disabled="disabled">
                            </div>
                        </div>
                         <div class="col-md-6">
                         <div class="form-group">
                             <label for="form_prenom">Prenom</label>
                             <input id="form_prenom" type="text" name="txtPrenom" class="form-control" value="<?php echo /*$unPrenom*/ "Prenom"; ?>" disabled="disabled">
                         </div>
                    	</div>
                  </div> <?php
				
			} elseif ($choix == 'modifier') {
				echo 'modier';
				
			} elseif ($choix == 'supprimer') {
				echo 'supprimer';
			} else {
				
			}
		} else { ?>
		<div id="page-contenu">
			<div id="page-contenu-head">
				<ul id="menu-horizontal">
					<li>Gerer les événements</li>
				</ul>
			</div>
			<div id="page-contenu-body">
				<form name="form1" id="form1" action="index.php?action=GererEvenements" method="post">
					<a id="liens" href="index.php?action=GererEvenements&choix=creer">Créer un nouvel événement</a>
					<a id="liens" href="index.php?action=GererEvenements&choix=modifier">Modifier un événement</a>
					<a id="liens" href="index.php?action=GererEvenements&choix=supprimer">Supprimer un événement</a>
				</form>
			</div>
		<?php } ?>
			
		</div>
	</div>
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
	<footer class="footer-bs " id="footer"> <?php include ('Footer.php'); ?> </footer>	  
</body>