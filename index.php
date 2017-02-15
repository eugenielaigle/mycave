<?php include 'header.php'; ?>

<?php $req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name');
?>

<nav>
	<!-- Bouton execution modal -->
<button data-toggle="modal" data-target="#myModal">
  Se connecter
</button>
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
</nav>
	
	<?php while ($donnees = $req->fetch()) { ?>

<div class="library">
	<div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 150px; height: 200px; background-size: cover;"></div>
	<h2><?php echo $donnees['name']; ?></h2>
	<h3>Année:<?php echo $donnees['year']; ?></h3>
	<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
	<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
	<p>Description: <?php echo $donnees['description'] ?></p>
	<a href="fiche_produit.php?id_produit=<?php echo $donnees['id']; ?>"><button>Consulter</button></a>

<?php } ?>
</div>

</body>
</html>
