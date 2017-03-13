<?php 
session_start();
include 'header.php';

if(isset($_SESSION['pseudo']) AND isset($_SESSION['id'])){


// REQUETE SQL
$req = $bdd->prepare('SELECT name, year, grapes, country, region, description, picture FROM mycave WHERE id = ?');
$req->execute(array($_GET['id_produit']));
$donnees = $req->fetch(); 

?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Modifier une référence</p>
			<?php 	if (isset($_GET['msg'])) {?>
				<p><?php  echo $_GET['msg'];?></p>
			<?php } ?>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<main class="main main-produit">

	<div class="container-fluid fiche">
		<div class="row row-produit">
			<form action="fiche_produit_update_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post" enctype="multipart/form-data">
			<!-- <div class="image" style="background-image: url('img/<?php echo $donnees['picture']; ?>'); width: 400px; height: 500px; background-size: cover;"></div> -->
				<div class="col-md-5 col-xs-12 image thumbnail update-pdt"> 
					<img src="img/<?php echo $donnees['picture']; ?>" alt="image-produit">
						<input type="file" name="picture">
				</div>
				<div class="col-md-2 col-xs-3 product-datas margin-top">
					<h3>Name:</h3>
					<h3>Année:</h3>
					<h3>Cépage:</h3>
					<h3>Pays:</h3>
					<h3>Région:</h3>
					<h3>Description:</h3>
				</div>
				<div class="col-md-4 col-xs-9 cells margin-top">
					<input type="text" name="name" value=<?php echo $donnees['name']; ?>>
					<input type="year" name="year" value=<?php echo $donnees['year']; ?>>
					<input type="text" name="grapes" value="<?php echo $donnees['grapes']; ?>">
					<input type="text" name="country" value=<?php echo $donnees['country']; ?>>
					<input type="text" name="region" value=<?php echo $donnees['region']; ?>>
					<textarea name="description" cols="30" rows="10"><?php echo $donnees['description'] ?></textarea>
				</div>

				<div class="col-md-12 col-xs-12 submit">
					<input type="submit">
					<a href="admin_index.php"><button>Retour</button></a>
				</div>
					
			</form>
						
			</div>
		</div> <!-- end row -->
	</div> <!-- end container -->
</main>

<?php }else header('location:index.php')?>