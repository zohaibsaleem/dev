<?php
	
/*	Template Name: Beispiel-Ansprechpartner
	
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





  
 
 	<div id="grid" >
         

	
<?php
$custom_terms = get_terms('department');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array(
    	'post_type' => 'contact_persons',
        'tax_query' => array(
            array(
                'taxonomy' => 'department',
                'field' => 'slug',
                'terms' => $custom_term->slug,
                'orderby' =>'date',
                'order' => 'DESC',
            ),
        ),
        'orderby' =>'date',
                'order' => 'DESC',
     );
     
     
     
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h3>'.$custom_term->name.'</h3>';

        while($loop->have_posts()) : $loop->the_post();
          //  echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
       ?> 
        <div <?php post_class('element-item cp-card col-md-12 '); ?> data-category="transition">
					
													
							<div class="content-1-3">
								<?php if(get_field('contact_person_lg')){?>
								<h3 class="card-subheader">	<?php the_field('contact_person_lg')?></h3>
								<?php }else{ ?>
								
								<h3 class="card-subheader"><?php the_field('funktion_amt_position'); ?></h3>
								<?php } ?>
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
																				
									  
         </div>   <!-- element-item -->
        
        
        
        <?php
        endwhile;
     }


?>     
     
     
     
     
        
          
 

 <?php } ?>   

</div>       
    	
	
</div>
	</div>


<?php echo get_num_queries(); ?>
</div>
<!-- end content container -->

<?php get_footer(); ?>



