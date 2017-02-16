<?php include 'header.php'; ?>

<?php $req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name');
?>

<nav>
	<img src="img/logo.png" alt="logo">
	<!-- Bouton execution modal -->
<button  data-toggle="modal" data-target="#myModal">
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
						<form action="login_post.php" method="post">
							<input type="text" class="validate" name="login" placeholder="login" id="myField" autofocus>
							<input type="password" class="validate" name="password" placeholder="Password">
							<input class="submit" type="submit">
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
	<div class="container-fluid library">

	<?php while ($donnees = $req->fetch()) { ?>	

	<div class="row">
		<div class="col-md-1 col-xs-3 image thumbnail"> 
			<img src="img/<?php echo $donnees['picture']; ?>" alt="image">
		</div>
		<div class="col-md-3 col-xs-8 div">
			<div class="text">
				<h2><?php echo $donnees['name']; ?></h2>
				<h3>Année:<?php echo $donnees['year']; ?></h3>
				<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
				<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
			</div>
		</div>
		<div class="col-md-6 col-xs-11 div suite">
				<p>Description: <?php echo $donnees['description'] ?></p>
		</div>
		<div class="col-md-2 col-xs-12 div suite">
			<a href="fiche_produit.php?id_produit=<?php echo $donnees['id']; ?>"><button>Consulter</button></a>
		</div>
	</div>

<?php } ?>
</div>
</main>

</body>
</html>
