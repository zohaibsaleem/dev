<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href='https://fonts.googleapis.com/css?family=Archivo+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div id="pagewrapper" class="container ">
	

    <div class="top-bar" >
     
    </div>
    
    <header class="masthead">
	<div class="container"> 
		  <!-- Logo start -->
			    	<div class="logo">
				    	<a href="#"><img class="img-responsive" alt="" src="<?php echo get_stylesheet_directory_uri();?>/images/logo.jpg" /></a>
				    </div>
				    <!-- Logo end -->
    
  


<?php get_template_part('template-part', 'topnav'); ?>
   	</div>
 </header>	  
   
   
  