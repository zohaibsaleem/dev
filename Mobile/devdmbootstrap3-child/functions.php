<?php
	
	
	
	function mytheme_custom_scripts(){
		
	   
    
    // Register and Enqueue a Script
    // get_stylesheet_directory_uri will look up child theme location
    wp_register_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));
    
    wp_register_script( 'classie', get_stylesheet_directory_uri() . '/js/classie.js', array('jquery'));
    
    wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.js', array('jquery'));
    
    wp_register_script( 'owl', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'));
    
    //wp_register_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'));
     
    // wp_register_style( 'slick', get_stylesheet_directory_uri() . '/css/slick.css');
	// wp_register_style( 'slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.css');
    
	// wp_enqueue_style( 'slick' );
	// wp_enqueue_style( 'slick-theme' );
    
    wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css');
    
    
   // wp_enqueue_script( 'slickjs' );    
    wp_enqueue_script( 'custom' );
    wp_enqueue_script( 'owl' );
    wp_enqueue_script( 'classie' );
    wp_enqueue_script( 'isotope' );
    
    
    wp_register_style( 'owlstyle', get_stylesheet_directory_uri() . '/css/owl.theme.css');
	wp_register_style( 'owldefault', get_stylesheet_directory_uri() . '/css/owl.theme.default.css');
	wp_register_style( 'owlc', get_stylesheet_directory_uri() . '/css/owl.carousel.css');
	
	
	
	wp_enqueue_style( 'owlstyle' );
	wp_enqueue_style( 'owldefault' );
	wp_enqueue_style( 'owlc' );

}

add_action('wp_enqueue_scripts', 'mytheme_custom_scripts');



function my_acf_admin_enqueue_scripts() {
	
	// register style
    wp_register_style( 'my-acf-input-css', get_stylesheet_directory_uri() . '/css/my-acf-input.css', false, '1.0.0' );
    wp_enqueue_style( 'my-acf-input-css' );
    
    
    // register script
  //  wp_register_script( 'my-acf-input-js', get_stylesheet_directory_uri() . '/js/my-acf-input.js', false, '1.0.0');
  //  wp_enqueue_script( 'my-acf-input-js' );
    
}

add_action( 'acf/input/admin_enqueue_scripts', 'my_acf_admin_enqueue_scripts' );

/* ======================== */
/*========================= */
/*	
	//hook the administrative header output
add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
echo '
<style type="text/css">
.dashicons-dashboard::before{background-image: url('.get_stylesheet_directory_uri().'/images/4v.jpg) !important;}
</style>
';
}


*/

/**
*
* Registration unserer Custom Post Types 
*/
add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'ausstellung-ergebnis',
		array(
			'labels' => array(
			'name' => __( 'Ausstellung-Ergebnis' ),
			'singular_name' => __( 'Ausstellung-Ergebnis' )),
			'public' => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-awards',
			'menu_position' =>4,
			'rewrite' => array('slug' => 'ausstellung-ergebnisse')
		)
	);
	
	
	register_post_type( 'zuechter',
		array(
			'labels' => array(
			'name' => __( 'Züchter' ),
			'all_items' => __( 'Alle Züchter' ),
			'singular_name' => __( 'Züchter' )),
			'public' => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-groups',
			'menu_position' =>4,
			'rewrite' => array('slug' => 'zuechter')
		)
	);
	
	register_post_type( 'rueden',
		array(
			'labels' => array(
			'name' => __( 'Rüden' ),
			'all_items' => __( 'Alle Rüden' ),
			'singular_name' => __( 'Rüden' )),
			'public' => true,
			'has_archive' => true,
			 'menu_icon'   =>get_stylesheet_directory_uri() . '"/images/running32x18.png"' ,
			 'menu_position' =>4,
			'rewrite' => array('slug' => 'angekoerte-rueden')
		)
	);
	
	register_post_type( 'contact_persons',
		array(
			'labels' => array(
			'name' => __( 'Ansprechpartner' ),
			'all_items' => __( 'Alle Ansprechpartner' ),
			'singular_name' => __( 'Ansprechpartner' )),
			'public' => true,
			'has_archive' => true,
			 'menu_icon'   =>'dashicons-id' ,
			 'menu_position' =>4,
			'rewrite' => array('slug' => 'ansprechpartner')
		)
	);

	
	register_taxonomy( 
		'varietaet', 
		array( 'zuechter','rueden' ),		
		array(
             'hierarchical' => true,
			 'label' => __('Varietät'),
			 'query_var' => 'varietaet',
			 'show_ui'               => true,
               'show_admin_column'     => true,
			 'rewrite' => array('slug' => 'varietaet' )
		)
	);
	
	register_taxonomy( 
		'department', 
		array( 'contact_persons' ),		
		array(
             'hierarchical' => true,
			 'label' => __('Bereich'),
			 'query_var' => 'department',
			 'show_ui'               => true,
               'show_admin_column'     => true,
			 'rewrite' => array('slug' => 'department' )
		)
	);

	
			

	
	flush_rewrite_rules( false );
	
}



/******************************/

/*

function dashboard_separators() {
echo '<style type="text/css">#adminmenu li.wp-menu-separator {margin: 0; background: #333;}</style>';
//echo '<style type="text/css"> li#menu-posts-ausstellung-ergebnis {background-color: #c5c5c5;}</style>';
}
add_action( 'admin_head', 'dashboard_separators' );

*/
/***************************/

add_filter('upload_mimes', 'eigene_upload_mimes');
function eigene_upload_mimes( $vorhandene_mimes ){
  $vorhandene_mimes['zip']  = 'application/zip';
  $vorhandene_mimes['csv']  = 'text/csv';
  $vorhandene_mimes['rtf']  = 'text/richtext';
  return $vorhandene_mimes;
}


		

function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}


/******************************/


//Excerpt with HTML

// Remove Read More Links from all excerpts
function custom_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/* ==================*/ 



/* ==================*/ 
add_filter('the_terms', 'no_terms_links', 10, 2);

function no_terms_links($term_list, $taxonomy) {

    if ('varietaet' == $taxonomy || 'contact_persons' == $taxonomy)
        return wp_filter_nohtml_kses($term_list);

    return $term_list;
}


/* ==================*/ 


 
function add_my_columns($columns) {
    return array_merge($columns,
          array('sorter' => 'Sortierfolge'));
}
add_filter('manage_zuechter_posts_columns' , 'add_my_columns');
 
function my_custom_columns( $column, $post_id ) {
    switch ( $column ) {
    case 'sorter' :    
       echo the_field('sortierfolge', $post->ID);
        break;
    }
}
add_action('manage_zuechter_posts_custom_column' , 'my_custom_columns', 10, 2 );

/* ==================*/ 


function add_my_columns2($columns) {
    return array_merge($columns,
          array('funktion_amt_position' => 'Funktion-Amt-Position'));
}
add_filter('manage_contact_persons_posts_columns' , 'add_my_columns2');
 
function my_custom_columns2( $column, $post_id ) {
    switch ( $column ) {
    case 'funktion_amt_position' :    
       echo the_field('funktion_amt_position', $post->ID);
        break;
    }
}
add_action('manage_contact_persons_posts_custom_column' , 'my_custom_columns2', 10, 2 );


/* ==================*/ 

// Shortcodes einbinden
include_once (STYLESHEETPATH . '/ykm-shortcodes.php');




/*
// add individual dashboard-widget
function kb_dashboard_widget() {
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
	
	echo("Liste aller Züchter  <br />\n") ;
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
	<?php  ?>	   
  <?php wp_reset_postdata();?>
<?php	
	
} 
 
function kb_add_dashboard_widget() {
	wp_add_dashboard_widget('kb_dashboard_widget', 'Liste aller Z&uuml;chter', 'kb_dashboard_widget');
}

add_action('wp_dashboard_setup', 'kb_add_dashboard_widget' );


*/



//////////////////////////////////////////////////////////////////

?>