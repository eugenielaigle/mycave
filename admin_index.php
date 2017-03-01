<?php 

session_start();

include 'header.php';



// REQUETE SQL

	$req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name');

?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>
	
	<?php 	
	if (isset($_GET['msg'])) {
	echo $_GET['msg'];
	} ?>

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
									<h3>Année:<?php echo $donnees['year']; ?></h3>
									<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
									<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
									<!-- <h3 class="xs-visible">Description : </br>"<?php echo $donnees['description'] ?>"</h3> -->
								</div>
							</div>
							<div class="col-md-6 col-xs-12 div suite">
									<p>Description: <?php echo $donnees['description'] ?></p>
							</div>
							<div class="col-md-2 col-xs-12 div buttons">
								<a href="fiche_produit_admin.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-search" aria-hidden="true"></i></button></a>
								<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
								<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
								<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-plus" aria-hidden="true"></i></button></a>
							</div>
						</div> <!-- end row -->
					</div> <!-- end swiper slide -->

<?php } ?>
			</div> <!-- end swipper-wrapper -->		
		</div> <!-- end container fluid -->
	</div> <!-- end swiper-container -->
</main>
	
<?php include 'footer.php'; ?>