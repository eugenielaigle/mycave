<?php 

try
{
$bdd = new PDO('mysql:host=u207501388_mycav;dbname=mycave;charset=utf8', 'u207501388_eugen', '36071503');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


?>
