<?php
/**
 * Theme file to Design User Identification form
 */
?>

<div class="text-center">
	<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
		<input type="hidden" name="action" value="user-identification" />
		<div>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
		</div>
		<br>
		<div>
			<label for="phone-number">Phone Number:</label>
			<input type="tel" id="phone-number" name="phone-number" required value="<?php echo isset($_POST['phone-number']) ? htmlspecialchars($_POST['phone-number']) : ''; ?>">
		</div>
		<br>
		<input type="submit" value="Submit">
	</form>
</div>
