<?php include("views/headers/header.php") ?>

<main id="login-page" class="container">
	<h1>Please Login</h1>

	<?php
		if($alert['error'] != '') {
			echo "<div class='alert alert-danger'>" . $alert['error'] . "</div>";
		}
	?>

	<form class="login-form" action="<? echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<div class="form-group">

			<select class="form-control" name="leader-name">
				<option value="">Please Select a Group...</option>
				<option value="lani">D. Lani Admin</option>
				<option value="thomas">D. Thomas Admin</option>
				<option value="jesus">B. Jesus Admin</option>
				<option value="jacob">D. Jacob Admin</option>
				<option value="daniel">B. Daniel Admin</option>
				<option value="devieon">B. Devieon Admin</option>
				<option value="rosana">M. Rosana Admin</option>
				<option value="naria">D. Naria Admin</option>
				<option value="liliana">S. Liliana Admin</option>
				<option value="marcia">S. Marcia Admin</option>
				<option value="juliana">S. Juliana Admin</option>
				<option value="claudia">S. Claudia Admin</option>
				<option value="leslie">S. Leslie Admin</option>
				<option value="alma">S. Alma Admin</option>
				<option value="aisha">S. Aisha Admin</option>
				<option value="tucson">Tucson Admin</option>
				<option value="mesa">Mesa Admin</option>
				<option value="avondale">Avondale Admin</option>
				<option value="nogales">Nogales Admin</option>
				<option value="sphoenix">South Phoenix Admin</option>
				<option value="surprise">Surprise Admin</option>
				<option value="yuma">Yuma Admin</option>
			</select>
			

			<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>

		<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
		
	</form>

	<a href="./forgot-password.php">Forgot Password</a>
</main>

<?php include("views/headers/footer.php"); ?>