<?php include 'header.php';

$req = $bdd->prepare('SELECT id, name, year, grapes, country, region, description, picture FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();

?>
<nav>
	<a href="fiche_produit.php?id_produit=<?php echo $donnees['id']; ?>"><button>Se Déconnecter</button></a>
</nav>

<div class="fiche">

	<?php 	
	if (isset($_GET['msg'])) {
	echo $_GET['msg'];
	} ?>
	
	<div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 400px; height: 500px; background-size: cover;"></div>
	<h2><?php echo $donnees['name']; ?></h2>
	<h3>Année:<?php echo $donnees['year']; ?></h3>
	<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
	<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
	<p>Description: <?php echo $donnees['description'] ?></p>
	<a href="admin_index.php"><button>Retour</button></a>
	<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button>Modifier</button></a>
	<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button>Supprimer</button></a>
	<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button>Ajouter</button></a>



</div>

