<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$target = get_query_var( 'target' );

if ( in_array( $target, array( 'collection-camp', 'dropping-center' ) ) ) :
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
	<?php elseif ( 'processing-center' === $target ) : ?>
		<div <?php echo get_block_wrapper_attributes(); ?>>
			<a href="" class="wp-block-gb-action-button">
				<?php esc_html_e( 'Contribution', 'goonj-blocks' ); ?>
			</a>
			<a href="" class="wp-block-gb-action-button">
				<?php esc_html_e( 'Contribution Monetary', 'goonj-blocks' ); ?>
			</a>
			<a href="" class="wp-block-gb-action-button">
				<?php esc_html_e( 'Goonj Visit', 'goonj-blocks' ); ?>
			</a>
		</div>
<?php endif;
