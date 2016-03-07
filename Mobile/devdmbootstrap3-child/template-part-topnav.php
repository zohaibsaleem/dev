
<?php if ( has_nav_menu( 'main_menu' ) ) : ?>


	  
    <div id="nav" class=" dmbs-top-menu">
        <nav id="topnav" class="navbar top-nav nav-animate navbar-default navbar-static-top"  role="navigation">
            
               
	               
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                        <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                

                <?php
                wp_nav_menu( array(
                        'theme_location'    => 'main_menu',
                        'depth'             => 2,
                        'container'         => 'div',
                         'container_id'		=> 'navbar-ex',
                        'container_class'   => 'collapse navbar-collapse navbar-1-collapse ',
                        'menu_class'        => 'nav navbar-nav  ',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>
                	  <?php //get_search_form(); ?>
        
        </nav>
    </div>

<?php endif; ?>