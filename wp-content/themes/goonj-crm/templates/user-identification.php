<?php
/**
 * Theme file to Design User Identification form
 */
?>

<div class="text-center">
	<form action="" method="post">
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

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Retrieve the email and phone number from the POST data.
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$phone_number = isset($_POST['phone-number']) ? $_POST['phone-number'] : '';

		// Use CiviCRM API to check for the contact.
		$result = civicrm_api3('Contact', 'get', [
			'sequential' => 1,
			'email' => $email,
			'phone' => $phone_number,
			'contact_sub_type' => ['IN' => ["Volunteer"]],
		]);

		// Display the result for now to check is the user is correct or not. Later on we modify the below code and redirect it to the collection camp if all the condition satisfies.
		echo '<pre>';
		if (!empty($result['values'])) {
			echo 'User found:';
			var_dump($result['values']);
		} else {
			echo 'User not found.';
		}
		echo '</pre>';
	}
	?>