<?php
	include("session.php");
	include("../database/database.php");
 
	$sql = "SELECT firstname, lastname FROM tb_user WHERE username = '$username'";
	$sql2 = "SELECT description FROM tb_motivations";
	
	$result = $mysqli->query($sql);
	$result2 = $mysqli->query($sql2);
	
	
 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
		}
	}
	
	$count = 0;
	
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			$count++;
		}
	}
	
	$limit = rand(1, $count);
	$sql3 = "SELECT description FROM tb_motivations LIMIT $limit";
	
	$result3 = $mysqli->query($sql3);
	
	if ($result3->num_rows > 0) {
		while($row = $result3->fetch_assoc()) {
			$quote = utf8_encode($row["description"]);
		}
	}
 
 
?>
<div class="col-lg-12">
	<h1 class="mb-0"><?php echo $firstname; ?>
		<span class="text-primary"><?php echo $lastname; ?></span>
	</h1>
	<div class="subheading mb-5">
		3542 Einträge · 13.4 KG Umsatz · 267 Aktive Tage
	</div>
	<p class="mb-5"><?php echo $quote; ?></p>
</div>