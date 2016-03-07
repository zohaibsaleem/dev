<?php

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( ' " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( ' " . $data . "' );</script>";

    echo $output;
}


?>

<?php get_header(); ?>



<!-- start content container -->
<div class="dmbs-content">
		<div class="page-title title-1">
						<div class="container">
							
								<h1>Angekörte Rüden</h1>
								<h3>Liste aller Deckrüden im DKBS</h3>
								
								
								
							
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
//foreach( $terms as $term ) {
  debug_to_console("Start ForEach : " . get_num_queries() );
    // Define the query
    $args = array(
	    
        'post_type' => 'rueden',
        'varietaet' => $term->slug,
		'meta_key'	=> 'rude_wurftag_datum',
        'orderby'    => 'meta_value',
		'order' => 'ASC'

    );
    query_posts( $args );
    
    
 
     // Start the Loop

    if( have_posts() )
    {
        while ( have_posts() ) : the_post(); 

          debug_to_console("Start loop : " . get_num_queries() );

         ?>
 
        <?php //$do_not_duplicate = $post->ID; ?>
        <div <?php post_class('element-item col-sm-6 col-md-6 '); ?> data-category="transition">

				<?php debug_to_console("First PHP Code : " . get_num_queries() );  ?>

					<div class="thumbnail arueden clearfix">
						<div class="caption">
							<span><?php the_terms( $post->ID, 'varietaet', 'Var: ', ', ', ' ' ); ?></span>

							<?php debug_to_console("Second PHP Code : " . get_num_queries() ); ?>

												   <?php debug_to_console("2 1/2 1 PHP Code : " . get_num_queries() ); ?>

							<span class="pull-right"><?php if(get_field('rude_choose_single_post')) {?> 

													 <?php debug_to_console("2 1/2 2 PHP Code : " . get_num_queries() ); ?>

													<?php debug_to_console("Third PHP Code : " . get_num_queries() ); ?>


							<a href="<?php the_permalink()?>">Extra</a> 

													<?php debug_to_console("Fourth PHP Code : " . get_num_queries() ); ?>
							
							<?php } ?></span>
					
							<div class="thumb_card_header">

												 <?php debug_to_console("4 1/2 PHP Code : " . get_num_queries() ); ?>

								<?php $image = get_field('rude_list_image');?>

							<?php debug_to_console("Fifth PHP Code : " . get_num_queries() ); ?>
							
							<img height="120px" class="image-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>"  />
							<?php debug_to_console("Sixth PHP Code : " . get_num_queries() ); ?>
							
							<?php 
								if( $image )
								{
									debug_to_console("TRUEEEEEEEEEEE");
								$images = get_field('rude_single_slideshow');

								//$image = $images[0];

								if( $images ): 
									
									$i =1;

												 //if(get_field('rude_list_bilder_anzahl') )
												// {
									$anzahl_bilder = get_field('rude_list_bilder_anzahl'); 
													// }								
													//else
													//{
													//	$anzahl_bilder = 3;
													//}

									if($anzahl_bilder > 1 )
									{
										foreach( $images as $image ): 
									
										if ($i <= $anzahl_bilder ) { ?>
									
										<img height="120px" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
										<?php  $i++;} 
											endforeach; ?>

							<?php	}

									else
									{
										?>

										<img height="120px" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />


								<?php

									}
								?>
									
								<?php endif; 
								}
								?>	
								
							
							<h2 class="page-header"><?php the_title() ;?></h2>
							<?php debug_to_console("Seventh PHP Code : " . get_num_queries() ); ?>
							
							
							<a class="link-wd" href="<?php the_field('link_workingdog');?>" target=_blank alt="<?php the_title() ;?>auf working-dog.eu" ></a>
							<span><?php the_field('rude_zuchtbuchnummer'); ?></span>
							</div>
							<?php debug_to_console("Eight PHP Code : " . get_num_queries() ); ?>
						
  
							
							
							
							
							
							<div class="thumb_card_content clearfix">
								<div class="1-1-content">
								V: <?php the_field('rude_vater'); ?>&nbsp;- M:&nbsp;<?php the_field('rude_mutter'); ?>
								<?php debug_to_console("Nine PHP Code : " . get_num_queries() ); ?>
								</div>
								
								<div class="content-1-3">WT: <?php the_field('rude_wurftag'); ?></div>
								<div class="content-2-3">Farbe: <?php the_field('rude_farbe'); ?></div>
								<div class="content-1-3"><?php the_field('rude_hd-ed'); ?></div>
								<div class="content-1-3">Größe:&nbsp;<?php the_field('rude_groesse'); ?></div>
								<div class="content-1-3">Formwert: <?php the_field('rude_formwert'); ?></div>
								
								<?php debug_to_console("Tenth PHP Code : " . get_num_queries() ); ?>

								<?php if (get_field('rude_list_auszeichnung')){
									 the_field('rude_list_auszeichnung');
									 }?>
								<?php debug_to_console("Eleventh PHP Code : " . get_num_queries() ); ?>
								
								<div class="content-1-1">Körung in <?php the_field('rude_koerung'); ?></div>
								<?php if (get_field('rude_koerurteil')){?> <div class="content-1-1">Körurteil: <?php the_field('rude_koerurteil'); ?></div><?php }?>


									<?php debug_to_console("Tweleve PHP Code : " . get_num_queries() ); ?>

								
								<div class="content-1-1">
									Besitzer: <?php the_field('rude_besitzer_name'); ?>, <?php the_field('rude_besitzer_strasse'); ?>, <?php the_field('rude_besitzer_plz'); ?>&nbsp; <?php the_field('rude_besitzer_ort'); ?>
								</div>
								<?php debug_to_console("Thirteen PHP Code : " . get_num_queries() ); ?>
								
								<?php if (get_field('rude_besitzer_tel')){?> 
									<div class="content-1-1">
										Tel.: <?php the_field('rude_besitzer_tel'); ?>
										<a href="mailto:<?php the_field('rude_besitzer_mail'); ?>">E-Mail</a>
										<?php if (get_field('rude_besitzer_web')){?> <a href="<?php the_field('rude_besitzer_web'); ?>">| Homepage</a><?php } ?>
									</div>
								<?php } ?>
								<?php debug_to_console("Fourteen PHP Code : " . get_num_queries() ); ?>
							
							</div><!-- thumb_card_content -->
							
							
							
						
      						</div>
    				</div>  <!-- thumbnail -->         
         		</div>   <!-- element-item -->
        
            
   <?php debug_to_console("End loop : " . get_num_queries() ); ?>

        <?php 
         endwhile;
         }
         ?>
		 



     <?php
    // use reset postdata to restore orginal query
    wp_reset_postdata();
     
//} ?>
</div>       
    	
	
</div>
	</div>



</div>
<?php echo get_num_queries(); ?>
<!-- end content container -->

<?php get_footer(); ?>



