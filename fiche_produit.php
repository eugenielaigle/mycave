<?php include 'header.php';

$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();
?>

<nav>
	<img src="img/logo.png" alt="logo">
	<button data-toggle="modal" data-target="#myModal">
 	 Se connecter
	</button>
</nav>
<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Veuillez entrer vos identifiants</h4>
					</div>
					<div class="modal-body">
						<form action="login_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post">
							<input type="text" class="validate" name="login" placeholder="login">
							<input type="password" class="validate" name="password" placeholder="Password">
							<input type="submit">
						</form>
						<?php  
						if (isset($_GET['msg'])) {
							echo $_GET['msg'];
						}?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

<main class="main">
<div class="fiche">
	<div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 400px; height: 500px; background-size: cover;"></div>
	<h2><?php echo $donnees['name']; ?></h2>
	<h3>Année:<?php echo $donnees['year']; ?></h3>
	<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
	<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
	<p>Description: <?php echo $donnees['description'] ?></p>
	<a href="index.php"><button>Retour</button></a>
</div>
</main>