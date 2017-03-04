<?php
// Projet Annuel - Site Inpact
// Fonction de la vue VueContact.php : affiche la vue permettant le contact des administrateurs / profs
// Ecrit le 18/11/2016 par Tony BRAY
// Modifié le 05/12/2016 par Erwann Bienvenu

?>
<head>
 <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	<div id="page">
	<header> <?php include ('Header.php'); ?> </header>
	<div id="main">
		<div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <form id="contact-form" method="post" action="index.php?action=Contact" role="form">

                        <div class="messages"> </div>

                        <div class="controls">
                        	<div class="row">
							    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_mail">Qui voulez vous contacter ?</label>
                                        <select class=form-control id="form_mail" name="txtContact" required>
                                        	<option selected value=>Selectionnez une personne</option>
                                     		<option value="delasalle.sio.boutin.k@gmail.com">Administrateur du site</option>
											<option value="delasalle.sio.profs@gmail.com">Professeurs</option>
										</select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_sujet">Sujet *</label>
                                        <input id="form_sujet" type="text" name="txtSujet" class="form-control" placeholder="Sujet du message *" required="required" value="<?php echo $unSujet; ?>" data-error="Le sujet est requis.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Nom *</label>
                                        <input id="form_name" type="text" name="txtNom" class="form-control" placeholder="Entrez votre nom *" required="required"  value="<?php echo $unNom; ?>" <?php if($unUtilisateur) echo "disabled=\"disabled\""?> data-error="Le nom est requis.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_prenom">Prenom *</label>
                                        <input id="form_prenom" type="text" name="txtPrenom" class="form-control" placeholder="Entrez votre prenom *" required="required" value="<?php echo $unPrenom; ?>" <?php if($unUtilisateur) echo "disabled=\"disabled\""?> data-error="Le prenom est requis.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="txtMail" class="form-control" placeholder="Entrez votre Email *" required="required" value="<?php echo $unMailUtilisateur; ?>" <?php if($unUtilisateur) echo "disabled=\"disabled\""?> data-error="Entrez une adresse mail valide.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_classe">Groupe *</label>
                                        <select class=form-control id="form_classe" name="listClasse" required <?php if( $unUtilisateur) echo "disabled = \"disabled\""?>>
                                        <?php 
                                        	if ($uneClasse != "Selectionner un groupe"){
                                        ?>
	                                        <option selected value=" <?php echo $uneClasse ?>"><?php echo $uneClasse ?></option>

                                        <?php 
                                        	}else{ ?>
		                                        <option <?php if ($uneClasse == "") echo "selected"?> value=>Selectionner un groupe</option>
		                                     		<option <?php if ($uneClasse == "SIO1") echo "selected"?> value=SIO1>SIO1</option>
													<option <?php if ($uneClasse == "SIO2") echo "selected"?>value=SIO2>SIO2</option>
													<option <?php if ($uneClasse == "Prof") echo "selected"?>value=Prof>Professeur</option>
													<option <?php if ($uneClasse == "Visiteur") echo "selected"?>value=Visiteur>Visiteur</option>
                                        	<?php }?>
                                        </select>
	                                     <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="txtMessage" class="form-control" placeholder="Entrez votre message *" rows="4" required="required" data-error="Entrez un message."><?php echo $unMessage; ?></textarea>
                                        <div class="help-block with-errors"></div>
                                        <!--  captcha -->
                                       <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-bottom: 15px;">
                                       		<div class="g-recaptcha" data-sitekey="6Lcltg4UAAAAAJK_c92iWns418RDALgSWSnjJqKz"></div>
                                       </div>
                                        <!--  captcha -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="btnEnvoi" style="background-color: #f5b570; border-color: #f5b570" name="btnEnvoi" type="submit" class="btn btn-success btn-block" value="ENVOYER MESSAGE">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!--<p class="text-muted"><strong>*</strong> Ce champ est requis.</p>-->
                                    <p style="text-align: center;"><?php echo $info; ?></p>
                                </div>
                            </div>
                        </div>

                    </form>

                </div><!-- /.8 -->

            </div> <!-- /.row-->
	</div> <!--  /.main -->
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
	<footer class="footer-bs " id="footer"> <?php include ('Footer.php'); ?> </footer>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/validator.js"></script>
   <!--  <script src="js/contact.js"></script> -->
  
</body>
