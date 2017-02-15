<?php 	

session_start();

// connexion sql

include 'connect.php';

// récolte de données

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

// requete sql (insert into)

$req = $bdd->prepare('INSERT INTO mycave (name, year, grapes, country, region, description, picture) VALUES (:name, :year, :grapes, :country, :region, :description, :picture)');

$req->execute(array(
		'name'=>$_POST['name'],
		'year'=>$_POST['year'],
		'grapes'=>$_POST['grapes'],
		'country'=>$_POST['country'],
		'region'=>$_POST['region'],
		'description'=>$_POST['description'],
		'picture'=>$nombdd
	));

// redirection admin.php

		$msg='Référence Ajoutée!';

		header('Location:admin_index.php?msg='.$msg);
 ?>