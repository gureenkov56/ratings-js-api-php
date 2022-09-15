<?php
require_once('./bd-connect.php');
global $pdo;

$query = 'SELECT * FROM `test-projects` WHERE `page` = "'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'"';
$rating = $pdo->query($query)->fetchAll()[0];

if ( empty($rating['ratings']) ) {
	$votes_count = 0;
} else {
	$votes_count = count(explode('|', $rating['ratings'])) - 1;
}

$rate_for_ip = false;
// check rate already or not
if ( strpos($rating['rate_already_ip'], $_SERVER['REMOTE_ADDR']) !== false ) {
	$ip_rate_arr = explode('|', $rating['rate_already_ip']);
	foreach ($ip_rate_arr as $value) {
		if (strpos($value, $_SERVER['REMOTE_ADDR']) !== false) {
			$rate_for_ip = explode("-",$value)[1];
		}
	}
}
?>