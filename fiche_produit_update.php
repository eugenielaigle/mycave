<?php 
session_start();
include 'header.php';

// REQUETE SQL
$req = $bdd->prepare('SELECT name, year, grapes, country, region, description, picture FROM mycave WHERE id = ?');
$req->execute(array($_GET['id_produit']));
$donnees = $req->fetch(); 

?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<main class="main">

<div class="fiche">
	<h2>Modifier une référence</h2>
	
	<form action="fiche_produit_update_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post" enctype="multipart/form-data">
			<div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 400px; height: 500px; background-size: cover;"></div>
					<input type="file" name="picture">
					<?php 	
					if (isset($_GET['msg'])) {
					echo $_GET['msg'];
					} ?>

			<h2>Name:</h2><input type="text" name="name" value=<?php echo $donnees['name']; ?>>
			<h3>Année:</h3><input type="year" name="year" value=<?php echo $donnees['year']; ?>>
			<h3>Cépage:</h3><input type="text" name="grapes" value="<?php echo $donnees['grapes']; ?>">
			<h3>Provenance:</h3>
					<h4>Pays:</h4><input type="text" name="country" value=<?php echo $donnees['country']; ?>>
					<h4>Région:</h4><input type="text" name="region" value=<?php echo $donnees['region']; ?>> 
			<p>Description:</p><textarea name="description" cols="30" rows="10"><?php echo $donnees['description'] ?></textarea>
			<input type="submit">
		</form>
	

</div>
</main>