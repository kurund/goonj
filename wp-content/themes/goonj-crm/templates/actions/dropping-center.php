<?php
/* Template for Dropping Center */
get_header();

$dropping_center_id = get_query_var('dropping_center_id');
?>

<div class="content">
    <h1>Dropping Center</h1>
    <p>Dropping Center ID: <?php echo esc_html($dropping_center_id); ?></p>
</div>

<?php
get_footer();
