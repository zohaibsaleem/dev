<?php get_header(); ?>


<style type="text/css">
	
	#filters-select
	{
  		display: none;
	}




	@media (max-width: 960px) 
	{
  		.container>#filters    { display: none !important; }
  		#filters-select { display: inline-block; }
	}

</style>
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
			
							<ul id="filters">
                                    <li class="active shape">
                                    
                                    <a href="#" class="filter active" data-filter="*">Alle</a>

                                    </li>
                                    <li class="shape">

                                    <a href="#" class="filter" data-filter=".department-allgemeine-informationen">Allgemein</a>

                                    </li>

                                    <!--<li class="shape"><a href="#" class="filter" data-filter=".department-bankverbindung">Bankverbindung</a></li>-->

                                    <li class="shape"><a href="#" class="filter" data-filter=".department-praesidium">Präsidium</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-geschaeftsstelle">Geschäftsstelle</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-zuchtkommission">Zuchtkommision</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-zuchtbuchamt">Zuchtbuchamt</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-tierschutz">Tierschutz</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-regionalzuchtwarte">Regionalzuchtwarte</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-zuchtausschuss">Zuchtausschuss</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-vermittlungen">Vermittlungen</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-cn-redaktion">CN-Redaktion</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-internet">Internet</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-sport-hund">Sport&Hund</a></li>
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-ausstellungswesen">Ausstellungswesen</a></li>
                                    
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-klubartikel-shop">Klubartikel-Shop</a></li>
                                    
                                    
                                    
                                    <li class="shape"><a href="#" class="filter" data-filter=".department-landesgruppen">Landesgruppen</a></li>
                            </ul>
<style type="text/css">
	option:checked
	{
		background: #A6B181;
		color:white;
	}
	
	option
	{
		    color: #A6B181;
    font-weight: bold;
	}
</style>
                            <select id="filters-select" >
                            	<option class="filter active" value="*" data-filter="*">Alle</option>

                            	<option  class="filter" value=".department-allgemeine-informationen" data-filter=".department-allgemeine-informationen">
                           Allgemein
                            	</option>

                            	<option class="filter" value=".department-praesidium" data-filter=".department-praesidium">
                            		
                            	Präsidium
                            	</option>

                            	<option class="filter " value=".department-geschaeftsstelle" data-filter=".department-geschaeftsstelle">Geschäftsstelle</option>

                            	<option class="filter" value=".department-zuchtkommission" data-filter".department-zuchtkommission">Zuchtkommision</option>
                            	<option class="filter" value=".department-zuchtbuchamt" data-filter".department-zuchtbuchamt">Zuchtbuchamt</option>
                            	<option class="filter" value=".department-tierschutz" data-filter".department-tierschutz">Tierschutz</option>
                            	<option class="filter" value=".department-regionalzuchtwarte" data-filter".department-regionalzuchtwarte">Regionalzuchtwarte</option>
                            	<option class="filter" value=".department-zuchtausschuss" data-filter".department-zuchtausschuss">Zuchtausschuss</option>
                            	<option class="filter" value=".department-vermittlungen" data-filter".department-vermittlungen">Vermittlungen</option>
                            	<option class="filter" value=".department-cn-redaktion" data-filter".department-cn-redaktion">CN-Redaktion</option>
                            	<option class="filter" value=".department-internet" data-filter".department-internet">Internet</option>
                            	<option class="filter" value=".department-sport-hund" data-filter".department-sport-hund">Sport&Hund</option>
                            	<option class="filter" value=".department-ausstellungswesen" data-filter".department-ausstellungswesen">Ausstellungswesen</option>

                            	<option class="filter" value=".department-klubartikel-shop" data-filter".department-klubartikel-shop">Klubartikel-Shop</option>

                            	<option class="filter" value=".department-landesgruppen" data-filter".department-landesgruppen">Landesgruppen</option>
                        

                            </select>

       
							
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
foreach( $terms as $term ) {}
 
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
        <div <?php post_class('element-item col-sm-6 col-md-4 '); ?> data-category="transition">

				
					<div class="thumbnail contact-persons contact-persons3">
						<div class="caption">
							
							<?php $terms = wp_get_post_terms( $post->ID, 'department', array("fields" => "names") );
					
								echo '<span>' .implode(', ',$terms). '</span>' ?>
							
							
							
							
										
							<div class="thumb_card_header">
								
								<?php if(get_field('contact_person_image')){?>
								
								<div class="content-1-3">
								<?php $image = get_field('contact_person_image');?>
								<img height="100px" class="image-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>
								<div class="content-2-3">
								<?php the_field('contact_person_address'); ?>
								</div>
								
								<?php }else{?>
								
								<div class="content-1-1">
								<?php the_field('contact_person_address'); ?>
								</div>
								<?php } ?>
							
							
							</div>

							
							<div class="thumb_card_content clearfix">
							
								<div class="content-1-1">
								<?php if(get_field('contact_person_mail')){?>
								<span class="pull-right"><a href="mailto:<?php the_field('contact_person_mail'); ?>">E-Mail</a></span>	
								<?php }?>
							<h2 class="card-header"><?php the_title() ;?></h2>
							
							
							
							<h3 class="card-subheader"><?php the_field('funktion_amt_position'); ?></h3>							
								
								
								</div>

								
						
							
							</div><!-- thumb_card_content -->
							
							
							
						
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



