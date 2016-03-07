<?php
	
/*	Template Name: Start
	
*/
?>

<?php get_header(); ?>



<!-- start content container -->
<div class=" dmbs-content">

<?php masterslider(2); ?>



<div id="contentWrapper">
			
				<div class="section">
					
					
					
					<div class="container center">
						
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
				
				<div class="section callto" style="padding:30px 0" data-stellar-background-ratio="0.6">
					
					<div class="container">
						<div class="cta_btn">
							
							<div class="f-left">
								<h2 class="cta_heading bold white">Erinnerung an <span class="main-color">wichtigen Termin</span> oder Einladung</h2>
								<h4 class="cta_heading white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus pretium rhoncus <span class="main-color">adipiscing elit</span>.</h4>
							</div>    
							
							<a class="btn btn-default btn-lg f-right" href="#">call to action</a>
							
						</div>
					</div>
				</div>
								
				
		
				
				
				<div class="section">
					<div class="container ">
						
						<div class="row">
							<div class="col-md-8">
								
								<div class="heading sub-head">
									<h3 class="bolder head-4 uppercase">Aktuelle <span class="main-color">Meldungen</span></h3>
								</div>
								<?php query_posts('showposts=2'); ?>
								
								<div class="row posts-mini">
									<?php while (have_posts()) : the_post(); ?>
									<div class="col-md-6 post-item">
										
										
										<figure>
											
											<?php the_post_thumbnail( array(320, 300) ); ?>
										</figure>
										
										
									
									    <article class="post-content">
									        <div class="post-info-container">
												<div class="post-info">
													<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
													<ul class="post-meta">
														
														<li class="meta_date"><i class="fa fa-clock-o"></i>15 Mai, 2015</li>
													</ul>
												</div>
											</div>
											<p><?php the_excerpt(); ?><a class="more_btn main-color" href="blog-single.html">Read more</a></p>
									    </article>
									</div>
									<?php endwhile;?>	
									
								</div>
									
								
							</div>
							
							<div class="col-md-4">								
								<!--
								<div class="heading sub-head">
									<h3 class="bolder head-4 uppercase">Termine</h3>
								</div>
								
								-->	
								<div class="terminbox shape gry-bg padding-horizontal-20 padding-vertical-20">
									
									<?php get_sidebar( 'right' ); ?>
									
									<!--
									<div class="testimonials-bg">
										<strong class="main-color">12.12.2015, Ort</strong>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
									</div>
									
									<div class="testimonials-bg">
										<strong class="main-color">12.12.2015, Ort</strong>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
									</div>
									
									<div class="testimonials-bg">
										<strong class="main-color">12.12.2015, Ort</strong>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
									</div>
									-->
								</div>
								
							
								
							</div>
							
						</div>
					</div>
				</div>







    



</div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
