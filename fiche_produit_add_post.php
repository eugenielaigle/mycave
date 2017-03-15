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

$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['picture']['name'], '.'); 

if (($_FILES['picture']['size'] > 0) && ($_FILES['picture']['size'] < 1000000) && (in_array($extension, $extensions))) {

$nom = uniqid().'.'.$_FILES['picture']['name'];


     $nom = strtr($nom, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $nom = preg_replace('/([^.a-z0-9]+)/i', '-', $nom);
$resultat = move_uploaded_file($_FILES['picture']['tmp_name'],'img/'.$nom);
if ($resultat) echo "Transfert réussi";

}else{
	$nom = 'generic.jpg';
}
// requete sql (insert into)
$req = $bdd->prepare('INSERT INTO mycave (name, year, grapes, country, region, description, picture) VALUES (:name, :year, :grapes, :country, :region, :description, :picture)');

$req->execute(array(
		'name'=>$_POST['name'],
		'year'=>$_POST['year'],
		'grapes'=>$_POST['grapes'],
		'country'=>$_POST['country'],
		'region'=>$_POST['region'],
		'description'=>$_POST['description'],
		'picture'=>$nom
	));

// redirection admin.php

		$msg='Référence Ajoutée!';

		header('Location:admin_index.php?msg='.$msg);
 ?>
