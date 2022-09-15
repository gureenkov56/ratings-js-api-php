<?php
// ПУТЬ К ФАЙЛУ
require_once('./ratings-start.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ПУТЬ К ФАЙЛУ -->
	<link rel="stylesheet" href="./style.css">
	<title>Document</title>
</head>
<body>
	<!-- СТАРТ ВЕРСТКА -->
	<div class="wrapper">
		<h3>Rate our service</h3>
		<div class="star__wrapper">
			<div class="star" data-rate="5"></div>
			<div class="star" data-rate="4"></div>
			<div class="star" data-rate="3"></div>
			<div class="star" data-rate="2"></div>
			<div class="star" data-rate="1"></div>
		</div>
		<div class="stats__wrapper">
			<hr/>
			<span class="stats"><span class="stats__current-rating"><?php echo $rating['totalrate'] ? $rating['totalrate'] : "0" ?></span> / 5</span><br/>
			<span class="stats__vote-count"><span id="voteNumber"><?= $votes_count ?></span> votes</span>
		</div>
	</div>
	<!-- КОНЕЦ ВЕРСТКА -->

</body>

<!-- СТАРТ ПЕРЕДАЧИ ДАННЫХ -->
<script>
	let
		ratesString = "<?= $rating['ratings'] ?>",
		alreadyRateIp = "<?= $rating['rate_already_ip'] ?>",
		ipHasRateAlready = "<?= $rate_for_ip ?>"
		ip = "<?= $_SERVER['REMOTE_ADDR'] ?>"
	;
</script>
<!-- КОНЕЦ ПЕРЕДАЧИ ДАННЫХ -->

<!-- ПУТЬ К ФАЙЛУ -->
<script src="./rating.js"></script>
</html>