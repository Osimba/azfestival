<?php include("views/headers/header.php") ?>

<main id="login-page" class="container">
	<h1>Reset Password</h1>

	<?php /*
		if($alert['error'] != '') {
			echo "<div class='alert alert-danger'>" . $alert['error'] . "</div>";
		}*/
	?>

	<?php /*if($alert['success'] != ''): */?>

		<div class="alert alert-success"><?php /*echo $alert['success'];*/ ?></div>

	<?php /*else: */?>

		<form class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

			<div class="form-group">
				<p>Enter your new password.</p>
				<input type="password" class="form-control" name="password" placeholder="New Password" 
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
				title="Must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 or more characters" required>

				<input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>

				<input type="hidden" class="form-control" name="email" value="<?= $email ?>">

				<input type="hidden" class="form-control" name="token" value="<?= $token ?>">
			</div>

			<input class="btn btn-primary btn-block" type="submit" name="login" value="Update Password">
			
		</form>

	<?php /* endif;*/ ?>

	<a href="./index.php">Return to homepage</a>
</main>

<?php include("views/headers/footer.php"); ?>