<?php 
session_start();

include 'header.php'; ?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>


<main class="main">
<div class="fiche">
	<h2>Ajouter une référence</h2>
	
	<form action="fiche_produit_add_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post" enctype="multipart/form-data">
			<input type="file" name="picture">
				<?php 	
				if (isset($_GET['msg'])) {
				echo $_GET['msg'];
				} ?>

			<h2>Name:</h2><input type="text" name="name">
			<h3>Année:</h3><input type="year" name="year">
			<h3>Cépage:</h3><input type="text" name="grapes">
			<h3>Provenance:</h3>
					<h4>Pays:</h4><input type="text" name="country">
					<h4>Région:</h4><input type="text" name="region"> 
			<p>Description:</p><textarea name="description" cols="30" rows="10"></textarea>
			<input type="submit">
		</form>

		<a href="admin_index.php"><button>Retour</button></a>
</div>
</main>