<?php get_header(); ?>



<!-- start content container -->
<div class="row dmbs-content">


    <div class="section">
		<div class="container">
			
								<ul id="filters">
                                    <li class="active shape"><a href="#" class="filter" data-filter="*">Alle</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-groenendael">Groenendael</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-laekenois">Laekenois</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-malinois">Malinois</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-tervueren">Tervueren</a></li>
                                </ul>
							
	

	
	
	
	
			
		<div id="grid" >
        	<?php // theloop
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
				<div <?php post_class('element-item col-sm-6 col-md-4 '); ?> data-category="transition">

				
					<div class="thumbnail">
							<div class="caption">
								<?php the_terms( $post->ID, 'varietaet', 'Var: ', ', ', ' ' ); ?>
							<h2 class="page-header"><?php the_title() ;?></h2>
							<?php the_content(); ?>
                
      						</div>
    				</div>           
         		</div>  
					
        <?php endwhile; ?>
		</div>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

</div>
	</div>



</div>
<!-- end content container -->

<?php get_footer(); ?>



