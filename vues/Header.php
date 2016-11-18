<!DOCTYPE html>
<html lang="en">

<head>


<title>Association Inpact</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="vues/style.css" media="screen" />
	<script type="text/javascript">

		$(document).ready(function(){
		    //Handles menu drop down
		    $('.dropdown-menu').find('form').click(function (e) {
		        e.stopPropagation();
		    });
		});

	</script>
</head>

<body>
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
						<a href="index.php?action=VueMenu" class="navbar-brand"><img
							src="images/logo.png"
							style="width: 95px; height: 50px; margin-top: -5px;"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse"
						style="padding-top: 6px;">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php?action=VueMenu" role="button" aria-haspopup="true" 
								aria-expanded="false" style="border-top: #000 solid 1px; margin-top: -14px; padding-top: 28px">Accueil</a>
							</li>
							
							<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evenements <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Departments</a></li>
									<li><a href="#">Add New</a></li>
								</ul>
							</li>
							<li class=" dropdown"><a href="#" class="dropdown-toggle active"
								data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Liens utiles <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#"><img id="liens" src="images/dls.png">Lycée de la salle</a></li>
									<li><a href="#"><img id="liens" src="images/anciens_eleves.png">Anciens élèves</a></li>
									<li><a href="#"><img id="liens" src="images/dls_arena.png">DLS Arena</a></li>
									<li><a href="#"><img id="liens" src="images/facebook.png">Facebook</a></li>
									<li><a href="#"><img id="liens" src="images/twitter.png">Twitter</a></li>
								</ul>
							</li>
							<li><a href="index.php?action=Contact">Contact</a>
							</li>
						</ul>
						
						<?php if ($_SESSION['login'] == ''){?>
						<ul class="nav navbar-nav pull-right">
		                    <li class="dropdown ui-login">
		                    	<a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" 
		                    	aria-expanded="false">Connexion <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li>
										<div class="row">
											<div class="col-md-12">
												<form class="form" role="form" method="post" action="index.php?action=Connecter"
													accept-charset="UTF-8" style="margin: 2px 8px;">
													<div class="form-group">
														<input type="text" name="txtLogin" id="txtLogin" class="form-control" placeholder="Login" required>
													</div>
													<div class="form-group">
														<input type="password" name="txtMdp" id="txtMdp" class="form-control" placeholder="Password" required>
													</div>
													<div class="form-group">
														<button type="submit" name="btnConnecter" id="btnConnecter" class="btn btn-success btn-block">Se connecter</button>
													</div>
												</form>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
						
						<?php }else{?>
						<ul class="nav navbar-nav pull-right">
							<li><a href="index.php?action=Deconnecter">Se déconnecter</a></li>
		                </ul>
		                <ul class="nav navbar-nav pull-right ui-right">
	                        <li><a>
	                        	&nbsp;Connecté en tant que <b><?php echo $login; ?></b>
	                        </a></li>
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
