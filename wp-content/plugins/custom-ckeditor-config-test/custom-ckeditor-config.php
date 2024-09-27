<?php
/**
 * Plugin Name:       Custom CKEditor Config
 * Description:       WordPress blocks for Goonj
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            ColoredCow
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-ckeditor-config
 *
 * @package Gb
 */

 function custom_ckeditor_config() {
    ?>
    <script type="text/javascript">
    function customizeCKEditorInstances() {
        if (typeof CKEDITOR !== 'undefined') {
            // Iterate over all CKEditor instances
            for (var instanceName in CKEDITOR.instances) {
                var editor = CKEDITOR.instances[instanceName];

                // Destroy the existing instance
                editor.destroy(true);

                // Reinitialize with custom config
                CKEDITOR.replace(instanceName, {
                    toolbar: [
                        { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print' ] },
                        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'Undo', 'Redo' ] },
                        { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll' ] },
                        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
                        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
                    ],
                    fontSize_sizes: '8/8px;10/10px;12/12px;14/14px;16/16px;18/18px;20/20px;24/24px;28/28px;36/36px;48/48px;',
                    stylesSet: [
                        { name: 'Custom Style 1', element: 'h3', attributes: { 'class': 'custom-style-1' } },
                        { name: 'Custom Style 2', element: 'p', attributes: { 'class': 'custom-style-2' } }
                    ]
                });
            }
        } else {
            setTimeout(customizeCKEditorInstances, 100); // Retry after 100ms if CKEditor is not ready
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(customizeCKEditorInstances, 2000); // Initial check after 100ms
    });
    </script>
    <?php
}
add_action('admin_head', 'custom_ckeditor_config');
