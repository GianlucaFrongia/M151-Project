<?php
	
	//Session und Datenbankverbindung einbinden
	include("session.php");
	include("../database/database.php");
	
//-------------------------------------------------- | Muskel Checkboxes generieren sowie Optionlist für die bestehenden Übungen | ------------------------------------------------------
	
	//Variabeln initialisieren
	$muscleList = "";
    $optionList = "";
	
	//Daten aus Datenbank auslesen
	$sql ="SELECT id, name FROM tb_muscle";
	$result = $mysqli->query($sql);
	
	//Daten aus der Auslese in einer formatiert Variabel speichern
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$entryToList = '
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input muscles" type="checkbox" value="'. $row["id"] .'">
					'. utf8_encode($row["name"]) .'
				</label>
			</div>';
            $optionToList = '
                <option value="'. $row["id"] .'">'. utf8_encode($row["name"]) .'</option>
            ';
			$muscleList = $muscleList . $entryToList;
            $optionList = $optionList . $optionToList;
		}
	}
	
//-------------------------------------------------- | Übungen des Users generieren | ------------------------------------------------------
	
	//Variabeln initialisieren
    $listEntries = "";
    
	//Daten zur Übung aus der Datenbank lesen
    $sql2 = "SELECT id, name, description FROM `tb_exercise` WHERE user_id = $userid";
    $result2 = $mysqli->query($sql2);
	
	//Übung generieren und in einer Variabel speichern
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
            
			//Variabeln auslesen bzw. initialisieren
            $exerciseID = $row["id"];
            $muscleListEntries = "";
            
			//Daten zu den in der Übung angegebenen Muskeln aus der Datenbank auslesen
            $sql3 = "SELECT mu.id, mu.name FROM tb_exercisehasmuscle AS exhamu
					LEFT JOIN tb_muscle AS mu ON exhamu.muscle_id = mu.id
					WHERE exhamu.exercise_id = $exerciseID";
            $result3 = $mysqli->query($sql3);
            
			//Muskeleintrag generieren und in einer Variabel speichern
            if ($result3->num_rows > 0) {
                while($row3 = $result3->fetch_assoc()) {
                    $newMuscleListEntry = '
                    <div exerciseID="'. $exerciseID .'" muscleID="'. $row3['id'] .'" class="muscleGroup">
                        <i style="cursor: pointer;" exerciseID="'. $exerciseID .'" muscleID="'. $row3['id'] .'" class="fa fa-times-circle deleteButton" aria-hidden="true"></i> '. utf8_encode($row3['name']) .' <br/>
                    </div>';
                    $muscleListEntries = $muscleListEntries . $newMuscleListEntry;
                }
            }
            
			//Übungseintrag formatieren, Daten einfügen (sowie die Daten aus der zuvor generierten Muskel Variabel und Optionlist)
			$newListEntry = '
            <div exerciseID="'. $exerciseID .'" class="card col-lg-12 userExercise">
                <div class="row">
                    <div exerciseID="'. $exerciseID .'" class="col-lg-12 headInfo" style="cursor: pointer;">
                        <b>'. $row['name'] .'</b><i class="fa fa-chevron-down" style="float: right;margin-top: 5px;" aria-hidden="true"></i>
                    </div>
                    <div exerciseID="'. $exerciseID .'" class="detailed col-lg-12" style="display: none;">
                        <hr/>
                        <div class="row">
                            <div class="col-lg-6">
                                Beschreibung: <br> <textarea exerciseID="'. $exerciseID .'" id="" style="height: 80%;margin-top: 0px; margin-bottom: 0px;" class="form-control fListdescription">'. $row["description"] .'</textarea><br/>
                                <div class="row savebutton" exerciseID="'. $exerciseID .'" style="display: none;">
                                    <div class="col-lg-12">
                                        <a exerciseID="'. $exerciseID .'" class="btn btn-lg btn-primary btn-block saveChangesButton">Änderungen speichern</a><br/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                Aktivierte Muskelgruppen:<br/>
                                <div class="musclesListed" exerciseID="'. $exerciseID .'">
                                    '. $muscleListEntries .'
                                </div>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <i exerciseID="'. $exerciseID .'" class="fa fa-plus-square addButton" style="margin-top: 10px;cursor: pointer;" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-lg-10">
                                        <select class="form-control muscleSelect" exerciseID="'. $exerciseID .'">
                                            <option></option>
                                            ' . $optionList . '
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-12">
                                <a exerciseID="'. $exerciseID .'" class="btn btn-lg btn-primary btn-block deleteExerciseButton"><i class="fa fa-trash" aria-hidden="true"></i> Übung löschen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>';
            
			//Eintrag an die Variabel anhängen
            $listEntries = $listEntries . $newListEntry;
            
		}
	}
    
?>

<h2>Meine <span class="text-primary">Übungen</span></h2>
<hr/>
<div id="allUserExercises">
    
    <?php if($listEntries){echo $listEntries;} else {echo "Du hast noch keine Übungen erstellt.";}; ?>
    
</div>
<hr/>
<h3>Übung hinzufügen</h3>
<div class="alert alert-danger" id="error" style="display: none;"></div>
<div class="alert alert-success" id="success" style="display: none;"></div>
<div id="exerciseForm" class="card col-lg-12" style="padding-bottom: 0px;">
	<div class="row">
		<div class="col-lg-3">
			<p class="text-center" style="margin-top: 10px;">Name der Übung:</p>
		</div>
		<div class="col-lg-9">
			<input class="form-control toggleInput" id="fname" style="width: 100%;" type="text"/>
		</div>
	</div>
    <div id="exerciseFormContent" style="display: none;">
        <div class="row"><div class="col-lg-12"><hr style="margin-top: 0;"/></div></div>
        <div class="row">
            <div class="col-lg-6">
                Beschreibung: <br> <textarea id="fdescription" style="height: 80%;" class="form-control"></textarea><br/><br/>
            </div>
            <div class="col-lg-6">
                Aktivierte Muskelgruppen:
                <?php echo $muscleList; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a id="addExerciseButton" style="margin-bottom:5px;" class="btn btn-lg btn-primary btn-block">Übung hinzufügen</a>
            </div>
        </div>
    </div>
</div>
<script src="./modul/exercise/exercise.js"></script>