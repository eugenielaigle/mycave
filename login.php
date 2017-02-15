<?php include 'header.php'; ?>

<div class="connexion">
<?php 

if (isset($_GET['id_produit'])){ ?>
		<form action="login_post.php?id_produit=<?php echo $_GET['id_produit']; ?>" method="post">
				<input type="text" class="validate" name="login" placeholder="login">
				<input type="password" class="validate" name="password" placeholder="Password">
				<input type="submit">

<?php  }else{ ?>

		<form action="login_post.php" method="post">
				<input type="text" class="validate" name="login" placeholder="login">
				<input type="password" class="validate" name="password" placeholder="Password">
				<input type="submit">
		</form>
</div>

<?php } ?>
<?php  

if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}?>