<?php
/**
 * Theme file to Design User Identification form
 */

// Retrieve the message from the global variable
$message = get_query_var('goonj_pending_induction_message', '');
?>

<div class="text-center">
    <form class="logged-out wp-block-loginout" action="<?php echo home_url(); ?>" method="POST">
        <?php if ($message) : ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <input type="hidden" name="action" value="goonj-check-user" />
        <?php if (!$message) : ?>
				<h2 class="mt-0 mb-6 font-sans fw-600">Goonj Collection Camp</h2>
				 <p class="mb-24 mt-0 font-sans">Please fill the following fields to continue</p>
            <div class="d-grid">
                <label class="font-sans" for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? esc_attr(sanitize_email($_POST['email'])) : ''; ?>">
            </div>
            <br>
            <div class="d-grid">
                <label class="font-sans" for="phone">Contact Number</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo isset($_POST['phone']) ? esc_attr(sanitize_text_field($_POST['phone'])) : ''; ?>">
            </div>
            <br>
            <p class="login-submit">
                <input type="submit" class="button button-primary w-520" value="Continue">
            </p>
        <?php endif; ?>
    </form>
</div>
