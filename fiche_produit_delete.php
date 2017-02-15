<?php
session_start();

require 'connect.php';

	$req = $bdd->prepare('SELECT name FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();
?>

<p>Vous êtes sur le point de supprimer une référence</p>
<p>Êtes-vous sûr(e) de vouloir supprimer définitivement <?php echo $donnees['name']; ?> de votre cave?</p>

<a href="fiche_produit_admin.php?id_produit=<?php echo $_GET['id_produit']; ?>"><button>Retour</button></a>

<form action="fiche_produit_delete_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post">
	<input type="submit" value="Oui">
</form>

