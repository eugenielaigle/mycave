<?php
session_start();

require 'connect.php';

	$req = $bdd->prepare('SELECT name FROM mycave WHERE id= ?');

	$req->execute(array($_GET['id_produit']));

	$donnees = $req->fetch();
?>

<!-- <p>Vous êtes sur le point de supprimer une référence</p>
<p>Êtes-vous sûr(e) de vouloir supprimer définitivement <?php echo $donnees['name']; ?> de votre cave?</p>

<a href="fiche_produit_admin.php?id_produit=<?php echo $_GET['id_produit']; ?>"><button>Retour</button></a>

<form action="fiche_produit_delete_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post">
	<input type="submit" value="Oui">
</form> -->

<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<a href="admin_index.php"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
							<h4 class="modal-title" id="myModalLabel">Vous êtes sur le point de supprimer une référence</h4>
					</div>
					<div class="modal-body">
						<p>Êtes-vous sûr(e) de vouloir supprimer définitivement <?php echo $donnees['name']; ?> de votre cave?</p>
						<a href="admin_index.php"><button>Retour</button></a>

						<form action="fiche_produit_delete_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post">
							<input id="confirmDelete" type="submit" value="Oui">
						</form>
						<?php  
						if (isset($_GET['msg'])) {
							echo $_GET['msg'];
						}?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

