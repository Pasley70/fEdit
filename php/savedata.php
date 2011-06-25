<?php

$fdata=$_POST['fdata'];
$fname=$_POST['fname'];

$intpt="/fEdit/php";
$bckut="/backup";

# restliche decodieren
# $fdata=rawurldecode($fdata);
$fdata=stripslashes($fdata);

if($fdata&&$fname){	
	// Verzeichnisse
	$basePath = realpath(dirname(__FILE__));			// Basis-Pfad für Dateihandling

	$basePath = substr($basePath,0,strlen($basePath)-strlen($intpt));

	$path_parts = pathinfo($fname);
	
	$f_dirname = $path_parts["dirname"];				// forms/	optionla erweitertes Verzeichnis
	
	/*
	if ($f_dirname){
		$f_dirname.="/";
	}
	*/
	
	/* if < php 5.2.0 */
	if(!isset($path_parts['filename'])){
		$path_parts['filename'] = substr($path_parts['basename'], 0,strpos($path_parts['basename'],'.'));
	}

	$f_basename =  $path_parts["basename"];					// form.htm	vollständiger Dateiname
	$f_filename = $path_parts["filename"];					// form		Dateiname ohne Suffix
	$f_extension = $path_parts["extension"];					// htm		Suffix
	
	// Backup erstellen
	$backuptime= date("Ymd_His");

	
	$fpname = $f_dirname.$f_filename.'_'.$backuptime.".".$f_extension;

	if (!@copy($basePath.$fname, $basePath.$bckut.$fpname)) {
		echo "Es konnte kein Backup erstellt werden:";
		echo "\nSource:";
		echo "\n",$basePath;
		echo "\n",$fname;
		echo "\nTarget:";
		echo "\n",$basePath;
		echo "\n",$bckut;
		echo "\n",$fpname;
		exit;
	}
	
	// Daten speichern
	if($f=@fopen($basePath.$fname, "w+")) {
		fputs($f, $fdata); 
		fclose($f);
	} else {
		echo "Datei konnte zum schreiben nicht ge&ouml;ffnet werden:";
		echo "\nTarget:";
		echo "\n",$basePath;
		echo "\n",$bckut;
		echo "\n",$fpname;
	}
} else {
	echo "Fehlende Daten!";
}

?>