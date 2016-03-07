<?php
	
/*	Template Name: Ausstellung
	
*/
?>

<?php get_header(); ?>



<!-- start content container -->
<div class=" dmbs-content">

<div id="contentWrapper">
			
				<div class="section">
					
					
					
					<div class="container">
						
						 <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="page-header"><?php the_title() ;?></h2>
            <?php the_content(); ?>
           
        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
						
						
					</div>
				</div>
				
					
			
				
				
				<div class="section">
					<div class="container">


<?php
error_reporting(0);
$handle = fopen("files/2016_nuernberg.csv", "r"); 
$csv = array();
$columnnames = fgetcsv($handle, 1000, ";");
$replacements = array(4 => "KatalogNr", 24 => "Zuechter", 58 => "Image");
$columnnames = array_replace($columnnames, $replacements);
/*echo '<pre>';
var_dump($columnnames);
echo '</pre>';*/
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

	 	echo 'Bild: '.utf8_encode($data['Bild']).'<br><br>';

	 	echo 'Bewerbe:<br>';

	 	$i = $keyStart;
	 	while($i++<$keyEnd-1) {
	 		$key = utf8_encode($columnnames[$i]);
	 		$value = utf8_encode($data[$key]);
	 		if (!empty($value)) {
	 			//echo $key.' '.$value.'<br>';
	 			echo $key.'<br>';
	 		}
	 		//echo $key.' '.utf8_encode($data[$key]);
	 	}

	 	echo '<h4>Titel: '.utf8_encode($data['Titel']).'</h4><br><br>';

	 	echo '<hr>';
	 	echo '</div>';

	 	$oldclass = utf8_encode($data['Klasse-RiBe']);
	}
}
?>








<p></p>



						
								
							</div>
							
							
							
						</div>
					</div>
				</div>







    

<?php echo get_num_queries(); ?>

</div>
</div>
<!-- end content container -->

<?php get_footer(); ?>
