<?php
/* Template for Processing Center */
get_header();

$processing_center_id = get_query_var('processing_center_id');
?>

<div class="content">
    <h1>Processing Center</h1>
    <p>Processing Center ID: <?php echo esc_html($processing_center_id); ?></p>
</div>

<?php
get_footer();
