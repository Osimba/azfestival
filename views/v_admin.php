<?php include("views/headers/header.php") ?>

<main id="login-page" class="container">
	<h1>Please Login</h1>

	<?php /*
		if($alert['error'] != '') {
			echo "<div class='alert alert-danger'>" . $alert['error'] . "</div>";
		}*/
	?>

	<form class="login-form" action="<? echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<div class="form-group">

			<select class="form-control" name="leader-title">
				<option value="">Please Select a Group...</option>
				<option value="lani-admin">D. Lani Admin</option>
				<option value="tomas-admin">D. Thomas Admin</option>
				<option value="jesus-admin">B. Jesus Admin</option>
				<option value="jacob-admin">D. Jacob Admin</option>
				<option value="daniel-admin">B. Daniel Admin</option>
				<option value="devieon-admin">B. Devieon Admin</option>
				<option value="rosana-admin">M. Rosana Admin</option>
				<option value="naria-admin">D. Naria Admin</option>
				<option value="liliana-admin">S. Liliana Admin</option>
				<option value="marcia-admin">S. Marcia Admin</option>
				<option value="juliana-admin">S. Juliana Admin</option>
				<option value="claudia-admin">S. Claudia Admin</option>
				<option value="leslie-admin">S. Leslie Admin</option>
				<option value="alma-admin">S. Alma Admin</option>
				<option value="aisha-admin">S. Aisha Admin</option>
				<option value="tucson-admin">Tucson Admin</option>
				<option value="mesa-admin">Mesa Admin</option>
				<option value="avondale-admin">Avondale Admin</option>
				<option value="nogales-admin">Nogales Admin</option>
				<option value="south-phoenix-admin">South Phoenix Admin</option>
				<option value="surprise-admin">Surprise Admin</option>
				<option value="yuma-admin">Yuma Admin</option>
			</select>
			

			<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>

		<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
		
	</form>

	<a href="./forgot-password.php">Forgot Password</a>
</main>

<?php include("views/headers/footer.php"); ?>