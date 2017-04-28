<!DOCTYPE html>
<html lang="en">

<head>
<title>Association Inpact</title>
<link rel="icon" href="images/logo.png">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" media="(min-width: 0px) and (max-width: 767px)"
	href="vues/styleXS.css" />
<link rel="stylesheet" media="(min-width: 768px) and (max-width: 991px)"
	href="vues/styleMD.css" />
<link rel="stylesheet" media="(min-width: 992px)"
	href="vues/styleLG.css" />
<!-- Chargement des font awesome -->
<link
	href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
	rel="stylesheet">
</head>

<body>
<?php 
include_once 'modele/DAO.class.php';
$dao = new DAO();
?>

	<div class="navbar-wrapper">
		<div class="container-fluid">
			<nav class="navbar navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#navbar"
							aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a href="index.php?action=Menu" class="navbar-brand"><img
							src="images/logo.png"
							style="width: 95px; height: 50px; margin-top: -5px;"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse"
						style="padding-top: 6px;">
						<ul class="nav navbar-nav">
							<li><a href="index.php?action=Menu" role="button"
								aria-haspopup="true" aria-expanded="false"
								style="border-top: #000 solid 1px; margin-top: -14px; padding-top: 28px">Accueil</a>
							</li>

							<li class="dropdown"><a href="#" class="dropdown-toggle "
								data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Menu <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="index.php?action=Evenements">Evenements</a></li>
									<?php if ($_SESSION['login'] != ''){ ?>
									<li><a href="index.php?action=AideDevoirs">Aide aux devoirs</a></li>
									<?php } ?>
								</ul></li>
							<li class=" dropdown"><a href="#" class="dropdown-toggle active"
								data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Liens utiles <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="http://www.lycee-delasalle.com/" target="_blank"><img
											id="liens" target="_blank" src="images/dls.png">Lycée de la
											salle</a></li>
									<li><a href="http://sio.lyceedelasalle.fr/ae/" target="_blank"><img
											id="liens" src="images/anciens_eleves.png">Anciens élèves</a></li>
									<li><a href="http://dlsarena.lycee-dls.com/" target="_blank"><img
											id="liens" src="images/dls_arena.png">DLS Arena</a></li>
									<li><a href="https://www.facebook.com/Inpactdls/"
										target="_blank"><img id="liens" src="images/facebook.png">Facebook</a></li>
									<li><a href="https://twitter.com/dls_sio" target="_blank"><img
											id="liens" src="images/twitter.png">Twitter</a></li>
									<li><a href="https://fr.linkedin.com/" target="_blank"><img
											id="liens" src="images/Linkedin.png">Linkedin</a></li>
								</ul></li>
							<li><a href="index.php?action=Contact">Contact</a></li>
							<li><a href="index.php?action=Frames">Pages externes</a></li>
						</ul>
						
						<?php if ($_SESSION['login'] == ''){?>
						<ul class="nav navbar-nav pull-right">
							<li class="dropdown ui-login"><a href="#"
								class="dropdown-toggle active" data-toggle="dropdown"
								role="button" aria-haspopup="true" aria-expanded="false">Connexion
									<span class="caret"></span>
							</a>
								<ul class="dropdown-menu">
									<li>
										<div class="row">
											<div class="col-md-12">
												<form class="form" role="form" method="post"
													action="index.php?action=Connecter" accept-charset="UTF-8"
													style="margin: 2px 8px;">
													<div class="form-group">
														<input type="text" name="txtLogin" id="txtLogin"
															class="form-control" placeholder="Login" required>
													</div>
													<div class="form-group">
														<input type="password" name="txtMdp" id="txtMdp"
															class="form-control" placeholder="Password" required>
													</div>
													<div class="form-group">
														<button type="submit" name="btnConnecter"
															id="btnConnecter" class="btn btn-success btn-block">Se
															connecter</button>
													</div>
												</form>
											</div>
										</div>
									</li>
								</ul></li>
						</ul>
						
						<?php }else{
						
							$tousLesMessages = $dao->getLesMessagesTo($dao->getUnUtilisateur($_SESSION['login'])->getId());
							if (isset ($tousLesMessages)){
								$nbMessagesNonLu = 0;
								foreach ($tousLesMessages as $msg){
									if ($msg->getLu() == 0){
										$nbMessagesNonLu += 1;
									}								
								}
							}
							?>
						<ul class="nav navbar-nav pull-right">
							<li><a href="index.php?action=Deconnecter">Se déconnecter</a></li>
						</ul>
						<ul class="nav navbar-nav pull-right ui-right">
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false"> &nbsp;Connecté en tant que <b> <?php if ($_SESSION['typeUtilisateur'] == "eleve"){echo $_SESSION['nom'];} else {echo $login; }
								if (isset ($nbMessagesNonLu) && ($nbMessagesNonLu != 0)){ ?>
									<span class="fa-stack fa-1x has-badge" data-count="<?php echo $nbMessagesNonLu ?>">
									  <i class="fa notif fa-bell-o fa-stack-1x"></i>
									</span>
								<?php } ?>
								</b><span
									class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="index.php?action=ModifierMonCompte">Mon compte</a></li>
								<li><a href="index.php?action=MessagesPrives">Messages<?php if (isset ($nbMessagesNonLu) && ($nbMessagesNonLu != 0)){ echo "<b> (". $nbMessagesNonLu . ")</b>"; }?></a></li>
								<?php if ($_SESSION['typeUtilisateur'] != "eleve") echo '<li><a href="index.php?action=GererEvenements">Gerer les événements</a></li>'?>
							</ul></li>
						</ul>
	                    <?php } ?>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
