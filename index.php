<?php include 'header.php'; ?>

<?php include 'nav_connexion.php'; ?> <!-- navbar -->

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

// REQUETE SQL CONTENU
 		$req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name LIMIT ' .($current_page-1)*$per_page. ', ' .$per_page. ''); // Ajout per_page après création de la variable dans PAGINATION 1/3 + DERNIERE ETAPE: ajout de ($current_page-1)*per_page pour faire apparaître les bouteilles dans le bon ordre

				 while ($donnees = $req->fetch()) { 
	?>	


					<div data-slide="swiper-slide" class="swiper-slide">
						<div class="row row-index">
							<div class="col-md-1 col-xs-12 image thumbnail div">
								<?php if ($donnees['picture'] === '.'){
									$donnees['picture'] = 'generic.jpg';
								} ?> 
								<img src="img/<?php echo $donnees['picture']; ?>" alt="image">
							</div>
							<div class="col-md-3 col-xs-12 div presentation">
								<div class="text">
									<h2><?php echo $donnees['name']; ?></h2>
									<h3>Année : <?php echo $donnees['year']; ?></h3>
									<h3>Cépage : <?php echo $donnees['grapes']; ?></h3>
									<h3>Provenance : <?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
									<!-- <h3 class="xs-visible">Description : </br>"<?php echo $donnees['description'] ?>"</h3> -->
								</div>
							</div>
							<div class="col-md-6 div suite md-visible">
									<p>Description: </br>"<?php echo $donnees['description'] ?>"</p>
							</div>
							<div class="col-md-2 col-xs-12 div buttons">
								<a href="fiche_produit.php?id_produit=<?php echo $donnees['id']; ?>"><button>Consulter</button></a>
							</div>
						</div> <!-- end row -->
					</div> <!-- end swiper slide -->

			<?php } ?> <!-- fin de boucle -->

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
				<li class="waves-effect"><a href="index.php?page=<?php echo $current_page-1 ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
			<?php endif ?>

			
			<?php for ($i=1; $i <= $nb_pages ; $i++) {?> <!-- ETAPE 1/6 i = nombre de tours de boucles -->

				<?php if ($i == $current_page): ?> <!-- ETAPE 4/6: Li active et Li autres -->
					<li class="active"><a href="#"><?php echo $i; ?></a></li>
				<?php else: ?>
					<li class="waves-effect"><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> <!-- ETAPE 2/6: href de Li et numéro de Li -->
				<?php endif ?>	

			<?php } ?>

			<?php if ($current_page == $nb_pages): ?> <!-- ETAPE 6/6: Chevron de droite -->
				<li class="disabled"><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
			<?php else: ?>
				<li class="waves-effect"><a href="index.php?page=<?php echo $current_page+1; ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
			<?php endif ?>
				
	    </ul>

<!-- END PAGINATION -->
	
</footer>

<?php include 'footer.php'; ?>
