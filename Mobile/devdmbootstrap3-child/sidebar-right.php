<?php
    global $dm_settings;
    if ($dm_settings['right_sidebar'] != 0) : ?>
    
        <?php //get the right sidebar
        dynamic_sidebar( 'Right Sidebar' ); ?>
    
<?php endif; ?>