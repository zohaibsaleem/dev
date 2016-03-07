<?php get_header(); ?>


<!-- start content container -->
<div class="dmbs-content">


    <div class="col-md-12 dmbs-main">
		<div class="container">
        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="page-header"><?php the_title() ;?></h2>
            <?php the_content(); ?>
           
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
		</div>
	</div>



</div>
<!-- end content container -->

<?php get_footer(); ?>
