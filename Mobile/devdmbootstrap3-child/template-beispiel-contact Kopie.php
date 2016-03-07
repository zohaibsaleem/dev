<?php
	
/*	Template Name: //Beispiel-Ansprechpartner
	
*/
?>

<?php get_header(); ?>



<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
							
								<h1>Ansprechpartner</h1>
								<h3></h3>

						</div>
					</div>

    <div class="section">
		<div class="container">
			

			
			
			
			
			
			
			
							
<?php //start by fetching the terms for the varietaet taxonomy
$terms = get_terms( 'department', array(
    //'orderby'    => 'date',
    'order' => 'ASC',
    'hide_empty' => 0
) );
?>    
 
 	<div id="grid" >
 <?php
// now run a query for each
foreach( $terms as $term ) :
 echo $term->name; 
 
 
 
    // Define the query
    $args = array(
	    
        'post_type' => 'contact_persons',
        //'department' => $term->slug,
		//'meta_key'	=> 'rude_wurftag_datum',
       // 'orderby'    => 'meta_value',
		'order' => 'ASC'

    );
    $query = new WP_Query( $args );
    
    
   
     // Start the Loop
   
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <?php $do_not_duplicate = $post->ID; ?>
        <div <?php post_class('element-item col-sm-6 col-md-6 '); ?> data-category="transition">
					<div class="thumbnail contact-persons contact-persons2">
						<div class="caption">							
							<div class="content-1-3">
								<span><?php the_terms( $post->ID, 'department', '', ', ', ' ' ); ?></span>
								<h3 class="card-subheader"><?php the_field('funktion_amt_position'); ?></h3>
							</div>								
							<div class="content-1-3">		
								<?php $image = get_field('contact_person_image');?>
								<img height="100px" class="image-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>								
							<div class="content-1-3"
								<h2 class="card-header"><?php the_title() ;?></h2>
								<?php the_field('contact_person_address'); ?>
								<a href="mailto:<?php the_field('contact_person_mail'); ?>">E-Mail</a>
							</div>
						</div>														
					</div>    				  
         </div>   <!-- element-item -->
      
         
        <?php endwhile;?>
		 
   
     <?php 
    // use reset postdata to restore orginal query
    wp_reset_postdata();
     
?>  
<?php endforeach; ?>
</div>       
    	
	
</div>
	</div>



</div>
<!-- end content container -->

<?php get_footer(); ?>



