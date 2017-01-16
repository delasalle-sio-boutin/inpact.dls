<?php
// Projet Annuel - Site Inpact
// Fonction de la vue VueModifierMonCompte.php : affiche la vue permettant la modification du compte
// Ecrit le 18/11/2016 par Erwann Bienvenu
// Modifié le 05/12/2016 par Erwann Bienvenu
?>

<body>
	<div id="page">
		<header> <?php include ('Header.php'); ?> </header>
		<div id="main">

			<div class="row">
		 		<div class="col-lg-8 col-lg-offset-2">
					 <form id="contact-form" method="post" action="index.php?action=ModifierMonCompte" role="form">
                        <div class="controls">
                        	<div class="row">
							    <div class="col-md-6">
                                </div>
							</div>
							
                            <div class="row">
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
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_classe">Groupe </label>
                                        <input id="form_classe" type="text" name="txtGroupe" class="form-control" value="<?php echo /*$unPrenom*/ "Groupe"; ?>" disabled="disabled">
                                    </div>
                                </div>
                            
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email</label>
                                        <input id="form_email" type="email" name="txtMail" class="form-control" placeholder="Entrez votre Email *" required="required" value="<?php echo /*$unMailUtilisateur*/ "Mail@mail.mail"; ?>" data-error="Entrez une adresse mail valide.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    	<div id="ck-button">
                                       		<label for="form_MailFromProfs">Recevoir les messages des professeurs par mail</label>                                      
                                       		<input id="form_mailFromProfs" type="checkbox" name="mailFromProfs" >
                                       		<div class="help-block with-errors"></div>
                                    	</div>
                                    	
                                    	<div id="ck-button">
                                        	<label for="form_MailFromEleves">Recevoir les messages des élèves par mail</label>                                      
                                       		<input id="form_mailFromEleves" type="checkbox" name="mailFromEleves" >
                                        	<div class="help-block with-errors"></div>
                                    	</div>
                               	 	</div>
                            	</div>
                            	
                            	<div class="col-md-12">
                                    <input id="btnEnvoi" name="btnEnvoi" type="submit" class="btn btn-success btn-block" value="Modifier mes informations">
                                </div>
                            </div>  
                                           
                          </div>
                    </form>
                </div><!-- /.8 -->
            </div> <!-- /.row-->
		</div> <!-- /.main -->

	</div> <!--  /.main -->
	<!-- Footer dans le div principale pour qu'il soit toujours en bas de la page -->
	<footer class="footer-bs " id="footer"> <?php include ('Footer.php'); ?> </footer>
	  
</body>