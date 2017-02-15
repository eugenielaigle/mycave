<?php 
include 'connect.php';

$pass_hache = sha1($_POST['password']);
$login = $_POST['login'];

$req = $bdd->prepare('SELECT id FROM user WHERE login = :loginREQ AND password = :passwordREQ');
$req->execute(array(
	'loginREQ'=> $login,
	'passwordREQ'=> $pass_hache

	));

$resultat = $req->fetch();

$pdt = $_GET['id_produit'];

if (isset($pdt)){

if (!$resultat) {
	$msg = "Votre identifiant ou votre mot de passe nest pas reconnu. Merci de renseigner vos identifiants.";
	header('Location: fiche_produit.php?id_produit='.$pdt&'msg='.$msg);
}else{
	session_start();
	$_SESSION['id'] = $resultat['id'];
	$_SESSION['pseudo'] = $login;
	header('Location: fiche_produit_admin.php?id_produit='.$pdt);
}


}else{

if (!$resultat) {
	header('Location: index.php?msg=Votre identifiant ou votre mot de passe nest pas reconnu. Merci de renseigner vos identifiants.');
}else{
	session_start();
	$_SESSION['id'] = $resultat['id'];
	$_SESSION['pseudo'] = $login;
	header('Location: admin_index.php');
}
}