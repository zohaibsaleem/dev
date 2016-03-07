<?php
	
/*	Template Name: Ausstellung-12-2-16
	
*/
global $post;
$post_id = get_the_ID();
?>

<?php get_header(); ?>



<!-- start content container -->
<div class=" dmbs-content">

					
					<div class="container">
						<h2 class="page-header">Ausstellung: Ergebnisse</h2>
						 <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h3><?php the_title() ;?></h3>
            <h4><?php the_field('date_of_show'); ?></h4>
            <?php the_content(); ?>
						
            <?php
						foreach ( get_field ( 'show_result_gallery' ) as $nextgen_gallery_id ) :
							$galleryid = $nextgen_gallery_id['ngg_id'];
							global $nggdb;

							$gallery = $nggdb->get_gallery($galleryid, 'sortorder', 'ASC', true, 0, 0);
							$path = pathinfo($gallery[1]->imageURL);
							$path = $path['dirname'].'/';
							//echo $path;

							/*foreach($gallery as $image){

								echo $image->imageURL.'<br />';
								echo $image->filename.'<br />';
							}*/
						
						endforeach;
						?>
           
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
						
						
					</div>
				

				
					<div class="container">

<?php
	
$file = get_field('show_result_file_upload');
if( $file ) {
    $url = $file['url'];
}

$type = get_field('show_result_type');
	
error_reporting(0);
$handle = fopen($url, "r"); 
$csv = array();
$columnnames = fgetcsv($handle, 1000, ";");
$replacements = array(4 => "KatalogNr", 24 => "Zuechter", 58 => "Image");
$columnnames = array_replace($columnnames, $replacements);
//echo '<pre>';
//var_dump($columnnames);
//echo '</pre>';
while (true == ($columns = fgetcsv($handle, 1000, ";"))) {
 	$row = array_combine($columnnames, $columns);
	$csv[] = $row;
}

$keyStart = array_search('Platz', $columnnames);
$keyEnd = array_search('Titel', $columnnames);
$oldclass = null;

if(is_array($csv)) {
	foreach($csv as $data) {
		if (empty($data)) {
			continue;
		}

		$newclass = utf8_encode($data['Klasse-RiBe']);

	  if($oldclass != $newclass ) {
			echo '<hr>';
			echo '<h2>'.utf8_encode($data['Klasse-RiBe']).'</h2>';
			echo 'Varietät: '.utf8_encode($data['Var']).' - ';
		  echo 'Geschlecht: '.utf8_encode($data['G0']).'<br><br>';
		  echo '<hr>';
		}


		echo '<row>';
		echo '<div style="padding-left:50px;">';
		echo '<h3>'.utf8_encode($data['Name']).'</h3>';
	  echo 'Katalog-Nummer: '.utf8_encode($data['KatalogNr']).' - ';
	  echo 'Formwert: '.utf8_encode($data['Formwert']).'<br><br>';

	  echo 'ZB-Nr: '.utf8_encode($data['ZB-Nr']).' - ';
	  echo 'Wurftag: '.utf8_encode($data['Wurftag']).'<br><br>';

	  echo 'Prüfungen: '.utf8_encode($data['Pruef']).'<br><br>';

	  echo 'Vater: '.utf8_encode($data['Vater']).' - ';
	  echo 'Mutter: '.utf8_encode($data['Mutter']).'<br><br>';

	  echo 'Besitzer: '.utf8_encode($data['Besitzer-2']).' '.utf8_encode($data['Besitzer-1']).' - ';
	  echo 'Züchter: '.utf8_encode($data['Zuechter']).'<br><br>';

	  echo 'Richterbericht: '.utf8_encode($data['RiBe']).'<br><br>';

	  echo 'Platzierung: '.utf8_encode($data['Platz']).'<br><br>';

	 	if (!empty($data['Image'])) {
	 		echo '<img class="img-resonsive" src="'.$path.''.utf8_encode($data['Image']).'"><br>';
	 	}

	 	echo 'Bewerbe:<br>';

	 	$i = $keyStart;
	 	while($i++<$keyEnd-1) {
	 		$key = $columnnames[$i];
	 		$value = utf8_encode($data[$key]);
	 		$key = ltrim($key);
	 		if (!empty($value)) {
	 			//echo $key.' '.$value.'<br>';
	 			if ($type == 'int') { 
		 			if ($key == 'CAC') { 
		 				echo 'CACIB ';
		 			}
		 		}	
	 			echo $key;
	 			echo '<br>';

	 		}
	 		//echo $key.' '.utf8_encode($data[$key]);
	 	}

	 	echo '<h4>Titel: '.utf8_encode($data['Titel']).'</h4><br><br>';

	 	echo '<hr>';
	 	echo '</div>';
	 	
	 	echo '</row>';

	 	$oldclass = utf8_encode($data['Klasse-RiBe']);
	}
}
?>









<p></p>



						
								
							</div>
							
							
							
						</div>
					</div>
				</div>







    



</div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
