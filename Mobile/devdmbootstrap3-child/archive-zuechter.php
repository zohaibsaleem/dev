<?php get_header(); ?>



<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
							
								<h1>Züchter</h1>
								<h3>Liste aller Züchter im DKBS</h3>

						</div>
					</div>

    <div class="section">
		<div class="container">
			
								<ul id="filters">
                                    <li class="active shape"><a href="#" class="filter active" data-filter="*">Alle</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-groenendael">Groenendael</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-laekenois">Laekenois</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-malinois">Malinois</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".varietaet-tervueren">Tervueren</a></li>
                                </ul>
							
	
	
<?php //start by fetching the terms for the varietaet taxonomy
$terms = get_terms( 'varietaet', array(
    'orderby'    => 'name',
    'order' => 'ASC',
    'hide_empty' => 0
) );
?>    
 
 	<div id="grid" >
 <?php
// now run a query for each
foreach( $terms as $term ) {}
 
    // Define the query
    $args = array(
	    
        'post_type' => 'zuechter',
        
        	        
      //  'varietaet' => $term->slug,
       'meta_key'	=> 'sortierfolge',
        'orderby'    => 'meta_value',
		'order' => 'ASC'

    );
    $query = new WP_Query( $args ); 
    
    
   
     // Start the Loop
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <?php $do_not_duplicate = $post->ID; ?>
        
        <div <?php post_class('element-item col-sm-6 col-md-4 '); ?> data-category="transition">

				
					<div class="thumbnail">
							<div class="caption">
								<span><?php the_terms( $post->ID, 'varietaet', 'Var: ', ', ', ' ' ); ?></span>
							<h2 class="page-header"><?php the_title() ;?></h2>
							<?php the_content(); ?>
							<?php if(get_field('zuchterchip_img')){?>
							<p><img class="img-responsive" src="<?php the_field('zuchterchip_img'); ?>" /></p>
							<?php } ?>
							
                
      						</div>
    				</div>  <!-- thumbnail -->         
         		</div>   <!-- element-item -->
        
         
        <?php endwhile;?>
		 
   
     <?php
    // use reset postdata to restore orginal query
    wp_reset_postdata();
     
?>
</div>       
    	
	
</div>
	</div>


<?php echo get_num_queries(); ?>
</div>
<!-- end content container -->

<?php get_footer(); ?>



