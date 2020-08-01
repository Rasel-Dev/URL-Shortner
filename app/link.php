<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: ../index.php');
}

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	session_start();
	$user_from =  isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'visitor';
	$user_id = session_id();
	$url = $_POST['url'];
	$link_key = bin2hex(random_bytes(3));
	date_default_timezone_set("Asia/Dhaka");
	$creation_date = new DateTime('now');
	// $creation_date = $creation_date->format('d M Y g:i A');
	$creation_date = $creation_date->format('Y-m-d H:i:s');

	$check = $con->prepare("SELECT * FROM url WHERE main_url = ?");
	$check->execute([$url]);

	if ($check->rowCount() > 0) {

		echo "exist";

	} else {

		$stmt = $con->prepare("INSERT INTO url(user_from, user_id, main_url, token_keys, creation_date) VALUES (?, ?, ?, ?, ?)");
		$stmt->execute([$user_from, $user_id, $url, $link_key, $creation_date]);


		$show_link = '<div class="shortener-data"><p>
						<img src="assets/imgs/link.png" alt="" width="30" height="30">&nbsp;&nbsp;
						<a href="http://localhost/url_shortner/a.php?k='. $link_key .'" target="_blank" id="short_link" title="Short Link">http://localhost/url_shortner/a.php?k='. $link_key .'</a>
				      </p>
					  <button type="button" onclick="copyDivToClipboard(this);">Copy</button></div>';
					  
		header('Content-Type: application/json');
		echo json_encode(array("link" => $show_link));

	}
	
}
