
<nav>
	<img src="img/logo.png" alt="logo">
	
	<!-- Bouton execution modal -->
<button class="md-visible" data-toggle="modal" data-target="#myModal">
  Se connecter
</button>
<button class="xs-visible" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in" aria-hidden="true"></i>
</button>
</nav>
<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Veuillez entrer vos identifiants</h4>
					</div>
					<div class="modal-body">
						<form action="login_post.php" method="post">
							<input type="text" class="validate" name="login" placeholder="login" id="myInput">
							<input type="password" class="validate" name="password" placeholder="Password">
							<input class="submit" type="submit">
						</form>
						<?php  
						if (isset($_GET['msg'])) {
							echo $_GET['msg'];
						}?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->