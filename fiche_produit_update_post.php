<?php 

session_start();

require 'connect.php';

if ($_FILES['picture']['size']==0){

$req = $bdd->prepare('UPDATE mycave SET name= ?, year=?, grapes=?, country=?, region=?, description=? WHERE id=?');

$req->execute(array(
	$_POST['name'],
	$_POST['year'],
	$_POST['grapes'],
	$_POST['country'],
	$_POST['region'],
	$_POST['description'],
	$_GET['id_produit']
	));

	$donnees = $req->fetch();

	$pdt = $_GET['id_produit'];
	$msg = 'Référence modifiée!';

	header('Location:fiche_produit_admin.php?id_produit='.$pdt.'&msg='.$msg);

}else{


$_FILES['picture']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_picture.png).
$_FILES['picture']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['picture']['size'];     //La taille du fichier en octets.
$_FILES['picture']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['picture']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

if ($_FILES['picture']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['picture']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

$nom = "img/{$_GET['id_produit']}.{$extension_upload}";
$nombdd = $_GET['id_produit'].'.'.$extension_upload;
$resultat = move_uploaded_file($_FILES['picture']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";

$req = $bdd->prepare('UPDATE mycave SET name= ?, year=?, grapes=?, country=?, region=?, description=?, picture=?  WHERE id=?');

$req->execute(array(
	$_POST['name'],
	$_POST['year'],
	$_POST['grapes'],
	$_POST['country'],
	$_POST['region'],
	$_POST['description'],
	$nombdd,
	$_GET['id_produit']
	));

	$donnees = $req->fetch();

	$pdt = $_GET['id_produit'];
	$msg = 'Référence modifiée!';

	header('Location:fiche_produit_admin.php?id_produit='.$pdt.'&msg='.$msg);

}
?>
