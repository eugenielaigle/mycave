<?php 

try
{
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u207501388_mycav;charset=utf8', 'u207501388_eugen', '36071503');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


?>
