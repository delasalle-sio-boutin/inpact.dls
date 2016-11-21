<?php
// Projet Annuel - Site Inpact
// Fonction de la vue VueContact.php : affiche la vue permettant le contact des administrateurs / profs
// Ecrit le 18/11/2016 par Tony BRAY
// Modifié le 20/11/2016 par Killian BOUTIN

// IL FAUDRAIT QUE TU AJOUTES UNE LISTE DEROULANTE A QUI ENVOYER LE MAIL => ADMIN : leurs adr mails
//																			PROF : delasalle.sio.profs@gmail.com
//TODO : Voir pour quel mail mettre 


?>

<header> <?php include ('Header.php'); ?> </header>
<head>
        <link href='css/css-contact.css' rel='stylesheet' type='text/css'>

</head>

<body>
	<div id="page">
		<div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <form id="contact-form" method="post" action="index.php?action=Contact" role="form">

                        <div class="messages"></div>

                        <div class="controls">
                        	<div class="row">
							    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_mail">Qui voulez vous contacter ?</label>
                                        <select class=form-control id="form_mail" name="contact" required>
                                        	<option selected value=></option>
                                     		<option value=MailAdmin>Administrateur du site</option>
											<option value=MailProf>Professeur</option>
										</select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Nom *</label>
                                        <input id="form_name" type="text" name="nom" class="form-control" placeholder="Entrez votre nom *" required="required" data-error="Le nom est requis.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_prenom">Prenom *</label>
                                        <input id="form_prenom" type="text" name="prenom" class="form-control" placeholder="Entrez votre prenom *" required="required" data-error="Le prenom est requis.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="mail" class="form-control" placeholder="Entrez votre Email *" required="required" data-error="Entrez une adresse mail valide.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_classe">Groupe *</label>
                                        <select class=form-control id="form_classe" name="classe" required>
                                        <option selected value=>Selectionnez un groupe</option>
                                     		<option value=Sio1>SIO1</option>
											<option value=Sio2>SIO2</option>
											<option value=Prof>Professeur</option>
											<option value=Visiteur>Visiteur</option>
											</select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Entrez votre message *" rows="4" required="required" data-error="Entrez un message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="btnEnvoi" name="btnEnvoi" type="submit" class="btn btn-success btn-block" value="SEND MESSAGE">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> Ce champ est requis.</p>
                                </div>
                            </div>
                        </div>

                    </form>

                </div><!-- /.8 -->

            </div> <!-- /.row-->
	</div>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/validator.js"></script>
   <!--  <script src="js/contact.js"></script> -->
	
</body>

<footer class="footer-bs fixed-bottom" id="footer"> <?php include ('Footer.php'); ?> </footer>