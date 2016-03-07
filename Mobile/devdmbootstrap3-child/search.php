<?php get_header(); ?>


<header class="masthead">
  <div class="container"> 

    <div class="col-sm-6">
     
    </div>
  </div>
</header>	

<?php get_template_part('template-part', 'topnav'); ?>

<!-- start content container -->
<div class="row dmbs-content">


    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">
		<div class="container">
			
		
		

   	

			
			
			
			<?php if (have_posts()) : ?>
			<h2 class="page-header"><span><?php echo $wp_query->found_posts; ?></span> Suchergebnisse</h2>
         <p class="info">Deine Suchergebnisse f&uuml;r <strong><?php echo $s ?></strong></p>
 
         <?php while (have_posts()) : the_post(); ?>
           
           <article class="search-result">
            <h2 class="search-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <div>
            <?php the_content(); ?> <a href="<?php the_permalink();?>">Den ganzen Beitrag lesen <i class="fa fa-angle-double-right"></i>
</a>
            <div>
           </article> 
         <?php endwhile; ?>
		 
         
 
      <?php else : ?>
      
      	<h2 class="page-header"><span><?php echo $wp_query->found_posts; ?></span> Suchergebnisse</h2>
      <article class="search-result">
         <h2 class="search-title">Leider nichts gefunden</h2>
      </article>
      <?php endif; ?>
			
			
			<a class="btn btn-default btn-custom" href=""><i class="glyphicon glyphicon-menu-left"></i>
Zurück zur Startseite</a>
			
			
			
			
     
		</div>
	</div>



</div>
<!-- end content container -->

<?php get_footer(); ?>
