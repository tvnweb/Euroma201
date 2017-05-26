<?php 
echo $_SERVER['DOCUMENT_ROOT'];

$fileFolder = "wp-content/themes/euroma2/img/gallery_scheda";


 $directory = $_SERVER['DOCUMENT_ROOT'].$fileFolder.'/';

 echo $directory;
$i = 1; 
$handler = opendir($directory);
while ($file = readdir($handler)) {
    if ($file != "." && $file != "..") {

    	echo $file." -> ".$newName;
        $newName = strtoupper($file);
        rename($directory.$file, $directory.$newName); // here; prepended a $directory
        $i++;
    }
}
closedir($handler);
?>