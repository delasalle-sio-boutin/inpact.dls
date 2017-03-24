<?php
// Projet Annuel - Site Inpact
// Fonction de la vue VueGererEvenements.php : affiche la vue permettant de gerer les évenements
// Ecrit le 24/03/2017 par Florentin GREMY
// Modifié le 24/03/2017 par Florentin GREMY
?>
<body>
	<div id="page">
		<header> <?php include ('Header.php'); ?> </header>
		<?php
		
		
		
		if (isset($_GET['choix'])) {
			$choix = $_GET['choix'];
			if ($choix == 'creer') { ?>
			<form id="contact-form" method="post" action="index.php?action=GererEvenements&choix=creer" role="form">
				<div class="controls">
                    <div class="row">
						<div class="col-md-6">
                        </div>
					</div>
				</div>	
				<div class="row" style="margin: 5px;">
                    <div class="col-md-6">
                       	<div class="form-group">
                         	<label for="form_titre">Titre</label>
                        	<input id="form_titre" type="text" name="txtTitre" required="required" class="form-control" placeholder="Inserer un titre en corélation avec votre événement" data-error="Un titre est requis!">
                       	</div>
                     </div>
                    <div class="col-md-6">
                       	<div class="form-group">
                         	<label for="form_date">Date de l'événement</label>
                        	<input id="form_date" type="date" name="txtDate" required="required" class="form-control" data-error="Une date est requise!">
                       	</div>
                     </div>
              	</div>
              	<div class="row" style="margin: 5px;">
                     <div class="col-md-12">
	                    <div class="form-group">
	                      	<label for="form_contenu">Contenu</label>
	                        <textarea id="form_contenu" name="txtContenu" class="form-control" placeholder="Inserer la description et les informations générales de cet événement" rows="4" required="required" data-error="Un contenu est requis."></textarea>
	                   	</div>
                     </div>
              	</div>
              	<div class="col-md-12">
                  	<input id="btnCreation" style="background-color: #f5b570; border-color: #f5b570" name="btnCreation" type="submit" class="btn btn-success btn-block" value="Valider la création de cet événement">
                </div>
             </form> <?php
			} elseif ($choix == 'modifier') {
				foreach ($lesEvenements as $unEvenement){ ?>
					<div class="divCliquable">
						<div class="ui-evenement-titre">
							 <?php echo $unEvenement->getTitre() . " (du " . $unEvenement->getDateEvenement() . ")"; ?>
							 <br>
						</div>
						<div class="ui-evenement-evt" style="height: auto;">
							 <?php echo $unEvenement->getContenu(); ?>
							 <br>
						</div>
						<div class="ui-evenement-suite" style="height: 50px; padding: 5px;">
							<a id="DirectionModifier" href="index.php?action=GererEvenements&choix=modifierzz&id=<?php echo $unEvenement->getId(); ?>" class="btn btn-success btn-block" style="text-decoration: none; background-color: #EEAC65; border-color: #EEAC65;">Modifier</a>
						</div>
					</div>
				<?php }				
			} elseif ($choix == 'supprimer') {
				foreach ($lesEvenements as $unEvenement){ ?>
						<div class="divCliquable">
							<div class="ui-evenement-titre">
								 <?php echo $unEvenement->getTitre() . " (du " . $unEvenement->getDateEvenement() . ")"; ?>
								 <br>
							</div>
							<div class="ui-evenement-evt" style="height: auto;">
								 <?php echo $unEvenement->getContenu(); ?>
								 <br>
							</div>
							<div class="ui-evenement-suite" style="height: 50px; padding: 5px;">
								<a id="btnSupprimer" href="index.php?action=GererEvenements&choix=supprimer ?>" class="btn btn-success btn-block" style="text-decoration: none; background-color: #EEAC65; border-color: #EEAC65;">Supprimer</a>
							</div>
						</div>
					<?php }
			} elseif (isset($_GET['id'])) {?>
				
			<form id="contact-form" method="post" action="index.php?action=GererEvenements" role="form">
				<div class="controls">
					<div class="row">
						<div class="col-md-6">
						</div>
					</div>
				</div>
				<div class="row" style="margin: 5px;">
					<div class="col-md-6">
						<div class="form-group">
							<label for="form_titre">Titre</label>
							<input id="form_titre" type="text" name="txtTitre" required="required" class="form-control" value="<?php echo $unTitre;?>" data-error="Un titre est requis!">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="form_date">Date de l'événement</label>
                        	<input id="form_date" type="date" name="txtDate" required="required" class="form-control" data-error="Une date est requise!" value="<?php echo $uneDateUS; ?>">
                    	</div>
                   	</div>
              	</div>
              	<div class="row" style="margin: 5px;">
                     <div class="col-md-12">
	                    <div class="form-group">
	                      	<label for="form_contenu">Contenu</label>
	                        <textarea id="form_contenu" name="txtContenu" class="form-control" required="required" data-error="Un contenu est requis."><?php echo $unContenu ;?></textarea>
	                   	</div>
                     </div>
              	</div>
              	<div class="col-md-12">
                  	<input id="btnModifier" style="background-color: #f5b570; border-color: #f5b570" name="btnEnvoi" type="submit" class="btn btn-success btn-block" value="Valider la modification de cet événement">
                </div>
             </form> <?php
					
				
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
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
	<footer class="footer-bs " id="footer"> <?php include ('Footer.php'); ?> </footer>	  
</body>