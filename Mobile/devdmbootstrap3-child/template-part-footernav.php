<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
    <div class="dmbs-footer-menu">
            <nav id="footernav" class="navbar navbar-inverse" role="navigation">
                
                    <div class="navbar-header dropup">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-2-collapse">
                            <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <?php
                    wp_nav_menu( array(
                            'theme_location'    => 'footer_menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse  navbar-collapse navbar-2-collapse',
                            'menu_class'        => 'nav dropup navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
              
                
                
                            </nav>
            
    </div>
    
<?php endif; ?>