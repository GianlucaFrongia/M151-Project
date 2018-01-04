<?php

    include("session.php");
	include("../database/database.php");
    
    $exerciseList = "";
    
    $sql ="SELECT id, name FROM tb_exercise";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

            $optionToList = '
                <option value="'. $row["id"] .'">'. $row["name"] .'</option>
            ';

            $exerciseList = $exerciseList . $optionToList;
		}
	}

?>

<h2>Meine <span class="text-primary">Pläne</span></h2>
<hr/>
<h3>Favoriten</h3>
<p>Du hast noch keinen Plan favorisiert</p>
<hr/>
<h3>Eigene</h3>
<p>Du hast noch keinen Plan erstellt</p>
<hr/>
<h3>Plan erstellen</h3>
<div class="card col-lg-12">
	<div class="row">
		<div class="col-lg-5">
			<p class="text-center" style="margin-top: 10px;">Name des Plans:</p>
		</div>
		<div class="col-lg-7">
			<input class="form-control" style="width: 100%;" type="text"/>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr style="margin-top: 0;"/></div></div>
	<div class="row">
		<div class="col-lg-12">
			Beschreibung: <br> <textarea class="form-control"></textarea>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12 allExercise">
			<div exerciseListID="1" class="card col-lg-12 exercise">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="sel1">Übung:</label>
							<select class="form-control" id="sel1">
                                <option></option>
								<?php if($exerciseList){echo $exerciseList;} else { echo "<option>Du hast noch keine Übungen definiert.</option>";} ?>
							</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="reps">Ausführungen:</label>
							<input exerciseListID="1" type="number" class="form-control" id="reps">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="sets">Wiederholungen:</label>
							<input type="number" class="form-control" id="sets">
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-12">
                    <i class="fa fa-plus-square addExerciseForm" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i><i class="fa fa-minus-square deleteExerciseForm" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i>
                </div>
            </div>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-lg btn-primary btn-block">Plan hinzufügen</a>
		</div>
	</div>
</div>
<script src="./modul/userPlan/userPlan.js"></script>