<?php include 'header.php'; ?>

<?php $req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name');
?>

<?php include 'nav_connexion'; ?>
	

<main class="main">
	<div class="container-fluid library">
		<div data-container="swiper-container" class="swiper-container">
			<div data-wrapper="swiper-wrapper" class="swiper-wrapper">
	
				<?php while ($donnees = $req->fetch()) { ?>	

					<div data-slide="swiper-slide" class="swiper-slide">
						<div class="row row-index">
							<div class="col-md-1 col-xs-12 image thumbnail div"> 
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

			<?php } ?>

			</div> <!-- end swipper-wrapper -->		
		</div> <!-- end container fluid -->
	</div> <!-- end swiper-container -->
</main>
	
<?php include 'footer.php'; ?>
