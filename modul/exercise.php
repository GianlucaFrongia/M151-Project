<?php

	include("session.php");
	include("../database/database.php");
	
	$muscleList = "";
	$entryToList = "";
	$sql ="SELECT id, name FROM tb_muscle";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$entryToList = '
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" value="'. $row["id"] .'">
					'. $row["name"] .'
				</label>
			</div>';
			$muscleList = $muscleList . $entryToList;
		}
	}
	
?>

<h2>Meine <span class="text-primary">Übungen</span></h2>
<hr/>
<p>Du hast bisher noch keine Übung erstellt.</p>
<h3>Übung hinzufügen</h3>
<div class="card col-lg-12">
	<div class="row">
		<div class="col-lg-5">
			<p class="text-center" style="margin-top: 10px;">Name der Übung:</p>
		</div>
		<div class="col-lg-7">
			<input class="form-control" style="width: 100%;" type="text"/>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr style="margin-top: 0;"/></div></div>
	<div class="row">
		<div class="col-lg-6">
			Beschreibung: <br> <textarea style="height: 80%;" class="form-control"></textarea><br/><br/>
		</div>
		<div class="col-lg-6">
			Aktivierte Muskelgruppen:
			<?php echo $muscleList; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<a id="addExerciseButton" class="btn btn-lg btn-primary btn-block">Übung hinzufügen</a>
		</div>
	</div>
</div>