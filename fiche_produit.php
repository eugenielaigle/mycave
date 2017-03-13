<?php include 'header.php';

 session_start();
 session_destroy();


$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();
?>

<?php include 'nav_connexion.php'; ?>

<main class="main main-produit">
	<div class="container-fluid fiche">
		<div class="row row-produit">
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
			<div class="col-md-12 col-xs-12 button">
				<a href="index.php"><button>Retour</button></a>
			</div>
		</div> <!-- end row -->
	</div> <!-- end container-fluid -->
</main>

<?php include 'footer.php'; ?>