<?php session_start();

 include 'header.php';

$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();

?>
<nav> <!-- navbar déconnexion -->
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
			<?php 	if (isset($_GET['msg'])) {?>
				<p><?php  echo $_GET['msg'];?></p>
			<?php } ?>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<main class="main main-produit">
	<div class="container-fluid fiche">
		<div class="row row-produit">
			<!-- Modal -->
				<div class="modal fade" id="myModal<?php echo $donnees['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?php echo $donnees['id']; ?>Label">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<a href="admin_index.php"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
									<h4 class="modal-title" id="myModalLabel">Vous êtes sur le point de supprimer une référence</h4>
							</div>
							<div class="modal-body">
								<p>Êtes-vous sûr(e) de vouloir supprimer <?php echo $donnees['name']; ?> de votre cave?</p>
							</div>
							<div class="modal-footer">
								<a href="admin_index.php"><button class="retour">Retour</button></a>

								<form action="fiche_produit_delete_post.php?id_produit=<?php echo $donnees['id']; ?>" method="post">
									<input id="confirmDelete" type="submit" value="Oui">
								</form>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				
			<div class="col-md-5 col-xs-12 image thumbnail"> 
				<img src="img/<?php echo $donnees['picture']; ?>" alt="image-produit">
			</div>
			<div class="col-md-7 col-xs-12 product-datas">
				<div>
					<h2><?php echo $donnees['name']; ?></h2>
					<h3>Année :   <?php echo $donnees['year']; ?></h3>
					<h3>Cépage :   <?php echo $donnees['grapes']; ?></h3>
					<h3>Provenance :   <?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
					<p>Description :</p>
					<p>"<?php echo $donnees['description'] ?>"</p>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 button md-visible">
				<a href="admin_index.php"><button>Retour</button></a>
				<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button>Modifier</button></a>
				<button data-toggle="modal" data-target="#myModal<?php echo $donnees['id']; ?>">Supprimer</button>
				<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button>Ajouter</button></a>
			</div>
			<div class="col-md-2 col-xs-12 button xs-visible">
				<a href="admin_index.php"><button><i class="fa fa-undo" aria-hidden="true"></i></button></a>
				<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
				<button data-toggle="modal" data-target="#myModal<?php echo $donnees['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-plus" aria-hidden="true"></i></button></a>
			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->
</main>

<?php include 'footer.php'; ?>