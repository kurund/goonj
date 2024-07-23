<?php
/**
 * Theme file to Design User Identification form
 */
?>

<div class="text-center">
	<form action="<?php echo home_url(); ?>" method="POST">
		<input type="hidden" name="action" value="goonj-check-user" />
		<div>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
		</div>
		<br>
		<div>
			<label for="phone">Phone Number:</label>
			<input type="tel" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
		</div>
		<br>
		<input type="submit" value="Submit">
	</form>
</div>
