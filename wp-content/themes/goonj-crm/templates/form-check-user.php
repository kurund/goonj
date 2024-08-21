<?php
/**
 * Theme file to Design User Identification form
 */

// Retrieve the message from the global variable
$message = get_query_var('goonj_pending_induction_message', '');
$purpose = $args['purpose'];
$target_id = get_query_var('target_id', '');
?>

<div class="text-center w-xl-520 m-auto">
	<form class="logged-out wp-block-loginout ml-30 mr-30 ml-md-0 mr-md-0" action="<?php echo home_url(); ?>" method="POST">
		<?php if ($message) : ?>
			<div class="message">
				<?php echo $message; ?>
			</div>
		<?php endif; ?>
		<!-- Hidden input field with conditional action value -->
		<input type="hidden" name="action" value="goonj-check-user" />
		<input type="hidden" name="purpose" value="<?php echo esc_attr($purpose); ?>" />
		<input type="hidden" name="target_id" value="<?php echo esc_attr($target_id); ?>" />
		<?php if (!$message) : ?>
			<div class="d-grid">
				<label class="font-sans" for="email">Email <span class="required-indicator">*</span></label>
				<input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? esc_attr(sanitize_email($_POST['email'])) : ''; ?>">
			</div>
			<br>
			<div class="d-grid">
				<label class="font-sans" for="phone">Contact Number <span class="required-indicator">*</span></label>
				<input type="tel" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? esc_attr(sanitize_text_field($_POST['phone'])) : ''; ?>">
			</div>
			<br>
			<p class="login-submit">
				<input type="submit" class="button button-primary w-100p" value="Continue">
			</p>
		<?php endif; ?>
	</form>
</div>
