<?php session_start();

 include 'header.php';

$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();

?>
<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<div class="fiche">

	<?php 	
	if (isset($_GET['msg'])) {
	echo $_GET['msg'];
	} ?>
	
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
			<div class="col-md-12 col-xs-12 button md-visible">
				<a href="admin_index.php"><button>Retour</button></a>
				<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button>Modifier</button></a>
				<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button>Supprimer</button></a>
				<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button>Ajouter</button></a>
			</div>
			<div class="col-md-2 col-xs-12 button xs-visible">
				<a href="admin_index.php"><button><i class="fa fa-undo" aria-hidden="true"></i></button></a>
				<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
				<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
				<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button><i class="fa fa-plus" aria-hidden="true"></i></button></a>
			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->
</main>
