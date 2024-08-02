<?php
/* Template for Collection Camp */
get_header();

$collection_camp_id = get_query_var('collection_camp_id');
?>

<div class="content">
    <h1>Collection Camp</h1>
    <p>Collection Camp ID: <?php echo esc_html($collection_camp_id); ?></p>
</div>

<?php
get_footer();
