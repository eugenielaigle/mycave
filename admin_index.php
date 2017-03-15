<?php 
	session_start();
		
 
include 'header.php'; 

if(isset($_SESSION['pseudo']) AND isset($_SESSION['id'])){
?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
		<?php 	if (isset($_GET['msg'])) {?>
				<p><?php  echo $_GET['msg'];?></p>
		<?php } ?>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<main class="main">
	<div class="container-fluid library">
		<div data-container="swiper-container" class="swiper-container">
			<div data-wrapper="swiper-wrapper" class="swiper-wrapper">


<?php
// REQUETE SQL PAGINATION 1/3
		$req = $bdd->query('SELECT COUNT(id) AS nb_bottles FROM mycave'); // faire une requête COUNT dans la base de données
		$donnees = $req->fetch(); // parcourir la bdd

		$nb_bottles = $donnees['nb_bottles'];
		$per_page = 3; // variable nombre de bouteilles par page
		$nb_pages = ceil($nb_bottles/$per_page); //ceil = plafond (éviter les décimaux) variable nombre de pages = nb de bouteilles /nb de bouteilles par page.
			if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nb_pages) { //ETAPE 3/6: DETERMINER LA CURRENT PAGE SI ELLE N'EST PAS = à 1
	 			$current_page = $_GET['page'];
	 		}else{
	 			$current_page = 1;
	 		}

 $req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name LIMIT ' .($current_page-1)*$per_page. ', ' .$per_page. ''); // Ajout per_page après création de la variable dans PAGINATION 1/3 + DERNIERE ETAPE: ajout de ($current_page-1)*per_page pour faire apparaître les bouteilles dans le bon ordre

				 while ($donnees = $req->fetch()) { ?>

				<div data-slide="swiper-slide" class="swiper-slide">
						<div class="row row-index">
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
							
							
							<div class="col-md-2 col-xs-12 image thumbnail div margin-top"> 
								<img src="img/<?php echo $donnees['picture']; ?>" alt="image">
							</div>
							<div class="col-md-3 col-xs-12 div presentation">
								<div class="text">
									<h2><?php echo $donnees['name']; ?></h2>
									<h3>Année : <?php echo $donnees['year']; ?></h3>
									<h3>Cépage : <?php echo $donnees['grapes']; ?></h3>
									<h3>Provenance : <?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
								</div>
							</div>
							<div class="col-md-5 col-xs-12 div suite">
									<p>Description : <?php echo $donnees['description'] ?></p>
							</div>
							<div class="col-md-2 col-xs-12 div buttons">
								<a href="fiche_produit_admin.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-search" aria-hidden="true"></i></button></a>
								<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
								<button data-toggle="modal" data-target="#myModal<?php echo $donnees['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								<a href="fiche_produit_add.php"><button class="xs-visible"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
							</div>
						</div> <!-- end row -->
					</div> <!-- end swiper slide -->

	
<?php } ?>

				<a href="fiche_produit_add.php"><i class="add fa fa-plus-circle fa-4x" aria-hidden="true"></i></a>
			</div> <!-- end swipper-wrapper -->		
		</div> <!-- end container fluid -->
	</div> <!-- end swiper-container -->
</main>

<footer>
		<!-- PAGINATION 2/3-->



		<ul class="pagination md-visible">

			<?php if ($current_page == 1): ?> <!-- ETAPE 5/6: CHEVRON DE GAUCHE-->
				<li class="disabled"><a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
			<?php else: ?>
				<li class="waves-effect"><a href="admin_index.php?page=<?php echo $current_page-1 ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
			<?php endif ?>

			
			<?php for ($i=1; $i <= $nb_pages ; $i++) {?> <!-- ETAPE 1/6 i = nombre de tours de boucles -->

				<?php if ($i == $current_page): ?> <!-- ETAPE 4/6: Li active et Li autres -->
					<li class="active"><a href="#"><?php echo $i; ?></a></li>
				<?php else: ?>
					<li class="waves-effect"><a href="admin_index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> <!-- ETAPE 2/6: href de Li et numéro de Li -->
				<?php endif ?>	

			<?php } ?>

			<?php if ($current_page == $nb_pages): ?> <!-- ETAPE 6/6: Chevron de droite -->
				<li class="disabled"><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
			<?php else: ?>
				<li class="waves-effect"><a href="admin_index.php?page=<?php echo $current_page+1; ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
			<?php endif ?>
				
	    </ul>

<!-- END PAGINATION -->
	
</footer>


<?php include 'footer.php' ?>

<?php }
else header('location:index.php')?>