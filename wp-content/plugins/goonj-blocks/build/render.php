<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<a href="" class="wp-block-gb-action-button">
		<?php esc_html_e( 'Register', 'goonj-blocks' ); ?>
	</a>
	<a href="" class="wp-block-gb-action-button">
		<?php esc_html_e( 'Contribute', 'goonj-blocks' ); ?>
	</a>
	<a href="" class="wp-block-gb-action-button">
		<?php esc_html_e( 'Donate', 'goonj-blocks' ); ?>
	</a>
</div>
