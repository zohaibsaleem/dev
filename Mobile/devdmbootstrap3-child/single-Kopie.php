<?php get_header(); ?>

<header class="masthead">
  <div class="container"> 
    <div class="col-sm-6">
      
    </div>
  </div>
</header>	

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->

<div class="dmbs-content">
    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">
	    <?php $postNumber = 1; ?>
<?php
	           if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
								<header class="singlehead">
							<?php 
								if ( has_post_thumbnail() ) { 
									the_post_thumbnail('full' , array( 'class' => 'img-responsive' ));
								} 
							?>
						</header>	
							
						
						
						
						
						
															 		   
						<section class="single-section clearfix " id="section-<?php the_ID(); ?>" >
							
								
								<article class="single-article clearfix">
									<div class="container">
								   <?php the_content(); ?>
									</div>
								</article>
								
								<article class="single-article single-mid clearfix">
									<div class="container">
									<h2>Die Fachgeschäfte - <em>In der City O.</em></h2>
								   <?php the_field('abschnitt_adresse');?>
									</div>
								   
								</article>
								
								<article class="single-article grid-article clearfix">
									<div class="container">
								   <?php the_field('abschnitt_galerie');?>
								
								
								   <div class="postcount-wrapper">
							
							
								
							<div class="prev-post">
							<?php
							$next_post = get_next_post(true);
							if (!empty( $next_post )): ?>
							<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="btn btn-default"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="postlink-title"><?php echo $next_post->post_title; ?></span>
							</a>
							<?php endif; ?>
							</div>	
							
							<div class="count-post">
								<span>
								<?php echo $postNumber++; ?>							
								<?php 
									$count_posts = wp_count_posts(); 
									echo ('von ' . $published_posts = $count_posts->publish); 
								?>
								</span>								
							</div>
							
						
							
							
							
							
							
							
							
							
								
							<div class="next-post ">
							 <?php
							 $prev_post = get_previous_post(true);
							 if (!empty( $prev_post )): ?>
							 <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="btn btn-default"><span class="postlink-title"><?php echo $prev_post->post_title; ?></span><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
							 </a>
							 <?php endif; ?>	
							</div>	
							
							</div>
								
								
								
								
								
								
								
									</div>
								</article>	
							
							
							<div class="container">
							
							
							<!----->
							
							</div>					   		
						
						
						
						
						
						
						
						</section>
								

				
				<?php endwhile; ?>
				  
				  	         
                <?php else: ?>

                    <?php get_404_template(); ?>

				<?php endif; ?>





<?php get_footer(); ?>

