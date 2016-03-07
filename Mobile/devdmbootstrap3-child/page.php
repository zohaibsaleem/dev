<?php get_header(); ?>
<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
					
								<h1><?php the_title();?></h1>
								<?php if(get_field('subheader')){
									echo "<h3>" .the_field('subheader'). "</h3>";
								}?>
								
								
								
							
						</div>
					</div>

    <div class="section">
		<div class="container">
			
					 <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            
            <?php the_content(); ?>
           
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
			
	
	
    	
	
</div>
	</div> <!section Ende -->



</div>
<!-- end content container -->

<?php get_footer(); ?>
