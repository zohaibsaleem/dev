<?php
	
/*	Templar
	
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
	
	/* */


// wie sollen die Zellen formattiert werden
$cellFormat["Name"] = "<b>##text##</b><br>";
setlocale(LC_ALL,'de_DE.UTF-8');

$row = 1; // Anzahl der Arrays

$tempp = get_stylesheet_directory()."/2015_petershagen.csv";

// Welche Felder ausgegeben werden sollen...
$wantedCells[] = "Var";
$wantedCells[] = "G0";
$wantedCells[] = "Name";
$wantedCells[] = "Wurftag";

$wantedCells[] = "Vater";
$wantedCells[] = "Mutter";
$wantedCells[] = "Formwert";


if (($handle = fopen($tempp, "r")) !== FALSE) { // Datei zum Lesen öffnen
 
	// Die erste Zeile mit den Spaltennamen auslesen
	$data = fgetcsv ($handle, 1000, ";");
	if(is_array($data)) {
    	foreach($data AS $cellNr => $cellName) {
        $cellNamesArray[$cellNr] = $cellName;
    	}
 	}
 	
 	while ( ($data = fgetcsv ($handle, 1000, ";")) !== FALSE ) { // Daten werden aus der Datei
	 		// in ein Array $data gelesen
	 		$num = count ($data); // Felder im Array $data // werden gezählt
	 		print "<p> $num fields in line $row: <br>";
	 		$row++; // Anzahl der Arrays wird inkrementiert
	 		$data = array_map("utf8_encode", $data);
	 			for ($c=0; $c < $num; $c++) { // FOR-Schleife, um Felder des Arrays auszugeben
		 			// Es werden nur die Felder ausgegeben die im Array $wantedCells steht...
		 			if(in_array($cellNamesArray[$c], $wantedCells)) {
		 				//if($cellFormat[$cellNamesArray[$c]]) print str_replace("##text##", $data[$c], $cellFormat[$cellNamesArray[$c]]); else
		 				 print $data[$c] . "<br>";
		 				 
		 				 
 						}
 					}
 				}
 fclose ($handle);
 
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
