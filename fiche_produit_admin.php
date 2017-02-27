<?php include 'header.php';

$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();

?>
<nav>
	<img src="img/logo.png" alt="logo">
	<a href="fiche_produit.php?id_produit=<?php echo $donnees['id']; ?>"><button>Se Déconnecter</button></a>
</nav>

<div class="fiche">

	<?php 	
	if (isset($_GET['msg'])) {
	echo $_GET['msg'];
	} ?>
	
	<main class="main main-produit swiper-container">
	<div class="container-fluid fiche swiper-wrapper">
		<div class="row row-produit swiper-slide">
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
				<a href="admin_index.php"><button>Retour</button></a>
				<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button>Modifier</button></a>
				<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button>Supprimer</button></a>
				<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button>Ajouter</button></a>

			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->
</main>
