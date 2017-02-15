<?php

session_start();

require 'connect.php';

$req = $bdd->prepare('DELETE FROM mycave WHERE id=?');
$req->execute(array($_GET['id_produit']));


$msg = 'Référence supprimée!';

header('Location: admin_index.php?msg=' . $msg);

?>
