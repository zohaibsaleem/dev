<?php
	
/*	Template Name: Ausgaben
	
*/
?>

<?php get_header(); ?>



<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
							
								<h1>Alle</h1>
								<h3></h3>
								
								
								
							
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
 <?php $i =1;
// now run a query for each
foreach( $terms as $term ) {
 
    // Define the query
    $args = array(
	    
        'post_type' => 'rueden',
        'varietaet' => $term->slug,
		'meta_key'	=> 'rude_wurftag_datum',
        'orderby'    => 'meta_value',
		'order' => 'ASC'

    );
    $query = new WP_Query( $args );
   
     // Start the Loop
    
        while ( $query->have_posts() ) : $query->the_post(); ?>
		
		
		
        <?php $do_not_duplicate = $post->ID; ?>
        <div <?php post_class('element-item element-item-a col-sm-6 col-md-6 '); ?> data-category="transition">							
							<span><?php the_terms( $post->ID, 'varietaet', 'Var: ', ', ', ' ' ); ?></span>
							<span class="pull-right"><?php if(get_field('rude_choose_single_post')) {?> 
							
							
							
							<?php } ?></span>
							<span class="pull-right"><a><?php echo $i; ?></a> 
							</span>

							<h4><?php the_title() ;?></h4>

      			       
         		</div>   <!-- element-item -->
        
         <?php $i ++; ?>
        <?php endwhile;?>
		 
   
     <?php
    // use reset postdata to restore orginal query
    wp_reset_postdata();
     
}?>
</div>       
    	
	
</div>
	</div>

<?php echo get_num_queries(); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>




