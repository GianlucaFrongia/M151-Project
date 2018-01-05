<?php
	include("session.php");
	include("../database/database.php");
 
	$sql = "SELECT reg_date, firstname, lastname FROM tb_user WHERE username = '$username'";
	$sql2 = "SELECT description FROM tb_motivations";
    $sql3 = "SELECT * FROM `tb_news` ORDER BY date DESC";
    $sql4 = "SELECT * FROM `tb_exercise` WHERE user_id = $userid;";
    $sql5 = "SELECT * FROM `tb_plan` WHERE creator = $userid";
    
    
	
	$result = $mysqli->query($sql);
	$result2 = $mysqli->query($sql2);
    $result3 = $mysqli->query($sql3);
    $result4 = $mysqli->query($sql4);
    $result5 = $mysqli->query($sql5);
    
    $news = "";
    
    if ($result3->num_rows > 0) {
		while($row = $result3->fetch_assoc()) {
         
            $newsEntry = '<b>'. $row['title'] .'</b><p>'. $row['content'] .'</p><br/>';
            
            $news = $news . $newsEntry;
            
        } 
    }
    
    
    $count = 0;
    
	if ($result4->num_rows > 0) {
		while($row = $result4->fetch_assoc()) {
         
            $count = $count + 1;
            
        } 
    }
	
    $cExercices = $count;
    
    $count = 0;
    
	if ($result5->num_rows > 0) {
		while($row = $result5->fetch_assoc()) {
         
            $count = $count + 1;
            
        } 
    }
	
    $cPlans = $count;
    
 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
            
            $now = time();
            $treg_date = strtotime($row['reg_date']);
            $difference = $now - $treg_date;
            
            $regSince = floor($difference / 86400);


		}
	}
	
	$count = 0;
	
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			$count++;
		}
	}
	
	$limit = rand(1, $count);
	$sql3 = "SELECT title, description FROM tb_motivations LIMIT $limit";
	
	$result3 = $mysqli->query($sql3);
	
	if ($result3->num_rows > 0) {
		while($row = $result3->fetch_assoc()) {
			$quote = "<b>" . utf8_encode($row["title"]) . "</b><br/>" . utf8_encode($row["description"]);
		}
	}
 
 
?>
<div class="col-lg-12">
	<h1 class="mb-0"><?php echo $firstname; ?>
		<span class="text-primary"><?php echo $lastname; ?></span>
	</h1>
	<div class="subheading mb-5">
		<?php echo $cExercices; ?> Übungen · <?php echo $cPlans; ?> Pläne ·  Seit <?php echo $regSince; ?> Tagen registriert
	</div>
	<p class="mb-5"><?php echo $quote; ?></p>
    <p>Herzlich willkommen auf dem Dashboard von FUC</p>
    <hr/>
    <h3>News vom Team</h3>
    <br/>
    <?php echo $news; ?>
</div>