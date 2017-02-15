<?php 

session_start();

include 'header.php';



// REQUETE SQL

	$req = $bdd->query('SELECT id, name, year, grapes, country, region, description, picture FROM mycave ORDER BY name');

?>

<nav>
	<p>Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a href="index.php"><button>Se Déconnecter</button></a>
</nav>
	
	<?php 	
	if (isset($_GET['msg'])) {
	echo $_GET['msg'];
	} ?>

	<?php while ($donnees = $req->fetch()) { ?>
<div class="library">
	<div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 150px; height: 200px; background-size: cover;"></div>
	<h2><?php echo $donnees['name']; ?></h2>
	<h3>Année:<?php echo $donnees['year']; ?></h3>
	<h3>Cépage:<?php echo $donnees['grapes']; ?></h3>
	<h3>Provenance:<?php echo $donnees['region'] . ', ' . $donnees['country']; ?></h3>
	<p>Description: <?php echo $donnees['description'] ?></p>
	<a href="fiche_produit_admin.php?id_produit=<?php echo $donnees['id']; ?>"><button>Consulter</button></a>
	<a href="fiche_produit_update.php?id_produit=<?php echo $donnees['id']; ?>"><button>Modifier</button></a>
	<a href="fiche_produit_delete.php?id_produit=<?php echo $donnees['id']; ?>"><button>Supprimer</button></a>
	<a href="fiche_produit_add.php?id_produit=<?php echo $donnees['id']; ?>"><button>Ajouter</button></a>



<?php } ?>
</div>

<?php include 'footer.php'; ?>