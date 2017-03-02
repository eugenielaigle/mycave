<?php 
session_start();

include 'header.php'; ?>

<nav>
	<img src="img/logo.png" alt="logo">
	<p class="md-visible">Ajouter une référence</p>
			<?php 	if (isset($_GET['msg'])) {?>
				<p><?php  echo $_GET['msg'];?></p>
			<?php } ?>
	<a class="md-visible" href="index.php"><button>Se Déconnecter</button></a>
	<a class="xs-visible" href="index.php"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
</nav>

<main class="main main-produit">

	<div class="container-fluid fiche">
		<div class="row row-produit">
	
			<form action="fiche_produit_add_post.php ?>" method="post" enctype="multipart/form-data">
			<div class="col-md-12 col-xs-12">
				<input type="file" name="picture">
			</div>
				<div class="col-md-2 col-md-offset-1 col-xs-3 product-datas margin-top">
					<h3>Name:</h3>
					<h3>Année:</h3>
					<h3>Cépage:</h3>
					<h3>Pays:</h3>
					<h3>Région:</h3>
					<h3>Description:</h3>
				</div>
				<div class="col-md-8 col-xs-9 cells margin-top">

					<input type="text" name="name">
					<input type="year" name="year">
					<input type="text" name="grapes">
					<input type="text" name="country">
					<input type="text" name="region"> 
					<textarea name="description" cols="30" rows="10"></textarea>
				</div>

				<div class="col-md-12 col-xs-12 submit">
					<input type="submit">
				</div>
		</form>
				<div class="col-md-12 col-xs-12 submit">
					<a href="admin_index.php"><button>Retour</button></a>
				</div>

		</div> <!-- end row -->
	</div> <!-- end container -->
</main>

<?php include 'footer.php'; ?>