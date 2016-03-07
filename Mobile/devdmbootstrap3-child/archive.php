<?php get_header(); ?>



<!-- start content container -->
<div class="row dmbs-content">


    <div class="col-md-12 dmbs-main">
		<div class="container">
        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="page-header"><a href="<?php the_permalink() ;?>"><?php the_title()?></a></h2>
            
           
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
		</div>
	</div>



</div>
<!-- end content container -->

<?php get_footer(); ?>
