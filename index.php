<?php

//Maarten van der Glas, maartenvanderglas.com, 2018
//list files of directory except index.php itself


$dir = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //get url of directory of index.php

//https or http
if ($_SERVER['HTTPS']) { 
$http = "https://";	
} else {
	$http = "http://"	;
}
$dir_complete = $http.$dir;


//put all the files of the directory in an array
$files = array(); 
foreach (glob("*") as $filename) {
	array_push($files, $filename);
}

//combine file-names with the path-name
$files_links = array(); 
foreach ($files as $filename) {
	if ($filename != "index.php"){ //exclude index.php
	array_push($files_links, $dir_complete . $filename);
	}
}

//display all files as links on page
foreach ($files_links as $link_name) { 
	echo '<a href='.$link_name.' target="_new">'.$link_name.'</a><br>';
	//echo "<br />";
}

?>
