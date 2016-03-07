<?php get_header(); ?>
<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
					
							
								<h2 class="page-header"><?php the_title() ;?></h2>
						
								
							
						</div>
					</div>

    <div class="section">
		<div class="container">
			
					<?php $images = get_field('rude_single_slideshow'); if( $images ): ?> <!– This is the gallery filed slug –>

					<div id="rueden-slider" class="owl-carousel owl-theme">

						<?php foreach( $images as $image ): ?> <!– This is your image loop –>

						<div class="item">
							<img class="image-responsive" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />

						</div>
						<?php endforeach; ?> 

					</div>

					<?php endif; ?> 

			
	
	
    	
	
</div>
	</div> <!section Ende -->



</div>
<!-- end content container -->

<?php get_footer(); ?>

