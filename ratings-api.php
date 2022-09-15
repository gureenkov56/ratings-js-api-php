<?php
require_once('./bd-connect.php');
global $pdo;

// check exist page or not
$check = 'SELECT * FROM `test-projects` WHERE EXISTS (SELECT * FROM `test-projects` WHERE `page` = "'.$_POST['page'].'")';
$check_res = $pdo->query($check)->fetch();

if ($check_res) {
	$query = 'UPDATE `test-projects` SET `ratings` = :ratings, `totalrate` = :totalrate, `rate_already_ip` = :rate_already_ip WHERE `test-projects`.`page` = :page ';
	$stmt = $pdo->prepare($query);
	$stmt->execute([
		'page' => $_POST['page'],
		'ratings' => $_POST['ratings'],
		'totalrate' => $_POST['totalrate'],
		'rate_already_ip' => $_POST['rate_already_ip']
	]);
} else {
	$query = "INSERT INTO `test-projects` (`page`, `ratings`, `totalrate`, `rate_already_ip`) VALUES (:page, :ratings, :totalrate, :rate_already_ip)";
	$stmt = $pdo->prepare($query);
	$stmt->execute([
		'page' => $_POST['page'],
		'ratings' => $_POST['ratings'],
		'totalrate' => $_POST['totalrate'],
		'rate_already_ip' => $_POST['rate_already_ip']
	]);
}
