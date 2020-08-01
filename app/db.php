<?php

try {

	$con = new PDO('mysql:host=localhost;dbname=url_shrink', 'root', '');
	$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch (PDOException $e) {

	echo "Error: " > $e->getMessage();
	
}

?>