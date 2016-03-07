<?php
	
/*	Template Name: Ausgaben-Zuechter
	
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
		
	<div class="col-md-6">						
	
<?php	
	  $county = wp_count_posts( 'zuechter' )->publish;
	  	  
	  $args2 = array(
    'post_type' => 'zuechter',
     'numberposts' => -1,
    'varietaet' => 'groenendael'
);
$count_gr = count( get_posts( $args2 ) );

$args3 = array(
    'post_type' => 'zuechter',
     'numberposts' => -1,
    'varietaet' => 'laekenois'
);
$count_lk = count( get_posts( $args3 ) );

$args4 = array(
    'post_type' => 'zuechter',
     'numberposts' => -1,
    'varietaet' => 'malinois'
);
$count_ml = count( get_posts( $args4 ) );

$args5 = array(
    'post_type' => 'zuechter',
     'numberposts' => -1,
    'varietaet' => 'tervueren'
);
$count_tv = count( get_posts( $args5 ) );
	
	echo("Liste aller Züchter nach Namen  <br />\n") ;
	echo "Gesamt: " .$county. " | ";
	echo "GR: " .$count_gr. " | ";
	echo "LK: " .$count_lk. " | ";
	echo "ML: " .$count_ml. " | ";
	echo "TV: " .$count_tv. " | ";
	echo("<br /><br />\n") ;
?>

	

<?php	
//start by fetching the terms for the varietaet taxonomy
$terms = get_terms( 'varietaet', array(
    'orderby'    => 'name',
    'order' => 'ASC',
    'hide_empty' => 0
) );
 
 
 	
$num = 0;
foreach( $terms as $term ) {}
    // Define the query
    $args = array(
        'post_type' => 'zuechter',
        //'varietaet' => $term->slug,
		'meta_key'	=> 'sortierfolge',
        'orderby'    => 'meta_value',
        'numberposts' => -1,
		'order' => 'ASC'

    );
        
    $query = new WP_Query( $args );		
		while ( $query->have_posts() ) : $query->the_post(); 		  
		 $num ++;
		 ?>
		 
        <div data-category="transition">						
							<span><b><?php echo strip_tags(get_the_term_list( $post->ID , 'varietaet', '('.$num.') ', ', ') );?></b></span>
							<?php the_title() ;?>    				      
         		</div>   <!-- element-item -->
        
        <?php endwhile; ?> 
  <?php wp_reset_postdata();?>

	</div>
<!--------------------------->	
	

		
	<div class="col-md-6">						
	
<?php	
	  $county = wp_count_posts( 'rueden' )->publish;
	  	  
	  $args2 = array(
    'post_type' => 'rueden',
     'numberposts' => -1,
    'varietaet' => 'groenendael'
);
$count_gr = count( get_posts( $args2 ) );

$args3 = array(
    'post_type' => 'rueden',
     'numberposts' => -1,
    'varietaet' => 'laekenois'
);
$count_lk = count( get_posts( $args3 ) );

$args4 = array(
    'post_type' => 'rueden',
     'numberposts' => -1,
    'varietaet' => 'malinois'
);
$count_ml = count( get_posts( $args4 ) );

$args5 = array(
    'post_type' => 'rueden',
     'numberposts' => -1,
    'varietaet' => 'tervueren'
);
$count_tv = count( get_posts( $args5 ) );
	
	echo("Liste aller Rüden nach Varietät  <br />\n") ;
	echo "Gesamt: " .$county. " | ";
	echo "GR: " .$count_gr. " | ";
	echo "LK: " .$count_lk. " | ";
	echo "ML: " .$count_ml. " | ";
	echo "TV: " .$count_tv. " | ";
	echo("<br /><br />\n") ;
?>

	

<?php	
//start by fetching the terms for the varietaet taxonomy
$terms = get_terms( 'varietaet', array(
    'orderby'    => 'name',
    'order' => 'ASC',
    'hide_empty' => 0
) );
 
 
 	
$num = 0;
foreach( $terms as $term ) {}
    // Define the query
    $args = array(
        'post_type' => 'rueden',
        //'varietaet' => $term->slug,
		//'meta_key'	=> 'sortierfolge',
       // 'orderby'    => 'meta_value',
        'numberposts' => -1,
		'order' => 'ASC'

    );
        
    $query = new WP_Query( $args );		
		while ( $query->have_posts() ) : $query->the_post(); 		  
		 $num ++;
		 ?>
		 
        <div data-category="transition">						
							<span><b><?php echo strip_tags(get_the_term_list( $post->ID , 'varietaet', '('.$num.') ', ', ') );?></b></span>
							<?php the_title() ;?>    				      
         		</div>   <!-- element-item -->
        
        <?php endwhile; ?> 
  <?php wp_reset_postdata();?>

	</div>




	
	
	
	    
    	
<!----------------------------->	
</div>
	</div>

<?php echo get_num_queries(); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>




