<?php
/**
 * Theme file to Design User Identification form
 */
?>

<div class="text-center">
	<form class="logged-out wp-block-loginout" action="<?php echo home_url(); ?>" method="POST">
		<input type="hidden" name="action" value="goonj-check-user" />
		<div class="d-grid">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
		</div>
		<br>
		<div class="d-grid">
			<label for="phone">Phone Number</label>
			<input type="tel" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
		</div>
		<br>
		<p class="login-submit">
			<input type="submit" class="button button-primary w-520" value="Submit">
		</p>
	</form>
</div>
