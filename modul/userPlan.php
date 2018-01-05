<?php

    include("session.php");
	include("../database/database.php");
    
    //--------------------------------------------------------------------//
    
    $allPlans = "";
    
    $sql1 = "SELECT p.id, p.`name`, p.`description`, u.pbPath, u.username FROM tb_plan AS p
    LEFT JOIN tb_user AS u ON u.id = p.creator
    LEFT JOIN tb_userhasfavorite AS uhf ON uhf.plan_id = p.id
    WHERE uhf.user_id = $userid";
    
    $result = $mysqli->query($sql1);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            
            $planID = $row['id'];
            $planName = $row['name'];
            $planDescription = $row['description'];
            $userPicPath = $row['pbPath'];
            $creatorName = $row['username'];
            $i = 1;
            
            $starEntry = '<i planID="'. $planID .'" isfav="true" class="fa fa-star favStar" style="margin-top: 0px; font-size: 30px;" aria-hidden="true"></i>';
            
            $exerciseList = "";
            
            $sql2 = "SELECT phe.`sets`, phe.`repetitions`, phe.`exercise_id`, e.name, e.description FROM `tb_planhasexercise` AS phe
            LEFT JOIN tb_exercise AS e ON e.id = phe.`exercise_id`
            WHERE phe.`plan_id` = $planID";
            
            $result2 = $mysqli->query($sql2);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    
                    $sets = $row2['sets'];
                    $reps = $row2['repetitions'];
                    $exerciseID = $row2['exercise_id'];
                    $exerciseName = $row2['name'];
                    $exerciseDescription = $row2['description'];
                    
                    $muscleList = "";
                    
                    $sql3 = "SELECT m.name FROM `tb_exercisehasmuscle` AS ehm
                    LEFT JOIN tb_muscle AS m ON m.id = ehm.`muscle_id`
                    WHERE ehm.`exercise_id` = $exerciseID";
                    
                    $result3 = $mysqli->query($sql3);
                    if ($result3->num_rows > 0) {
                        while($row3 = $result3->fetch_assoc()) {
                            
                            $muscleName = $row3['name'];
                            
                            if($muscleList){
                                $muscleList = $muscleName . ", " . $muscleList;
                            } else {
                                $muscleList = $muscleName;
                            }
                            
                            
                            
                        }
                    }
                    
                    $exerciseListEntry = '
                    <div class="listExercise">
                            <div class="row">
                                <div class="col-lg-1">
                                    <span style="font-size: 50px;">'. $i .'</span>
                                </div>
                                <div class="col-lg-11">
                                    <div class="row card">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <b>'. $exerciseName .'</b>
                                                </div>
                                                <div class="col-lg-6">
                                                    Aktive Muskeln:<br/>
                                                    '. utf8_encode($muscleList) .'
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    '. $exerciseDescription .'
                                                </div>
                                                <div class="col-lg-6">
                                                    Aufbau:<br/>
                                                    '. $sets .' mal '. $reps .' Wiederholungen
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>';
                        
                        $exerciseList = $exerciseList . $exerciseListEntry;
                        $i = $i + 1;
                        
                    
                }
            }
            
            if(!$userPicPath){
                $userPicPath = "./img/profile.jpg";
            } else {
                $userPicPath = "./modul/editProfile/" . $userPicPath;
            }
            
            $planListEntry = '
            <div planID="'. $planID .'" class="card col-lg-12 FavPlanListEntry">
                <div planID="'. $planID .'" class="row" style="cursor: pointer;">
                    <div planID="'. $planID .'" class="col-lg-5 headInfo">
                        <div class="row">
                            <div class="col-lg-2">
                                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="'. $userPicPath .'">
                            </div>
                            <div class="col-lg-10" style="padding-top: 10px;">
                                <span>Ersteller: '. $creatorName .'</span>
                            </div>
                        </div>
                    </div>
                    <div planID="'. $planID .'" class="col-lg-5 headInfo" style="padding-top: 10px;">
                        <b class="align-middle">'. $planName .'</b>
                    </div>
                    <div class="col-lg-2">
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-lg-6">
                                '. $starEntry .'
                            </div>
                            <div planID="'. $planID .'" class="col-lg-6 headInfo">
                                <i class="fa fa-chevron-down" style="margin-top: 5px;" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div planID="'. $planID .'" class="detailed" style="display: none;">
                    <div class="row">
                        <div class="col-lg-12">
                            <hr/>
                            '. $planDescription .'
                            <hr/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="plansExercises">
                            
                            '. $exerciseList .'
                            
                        </div>
                    </div>
                </div>
            </div>
            <br/>';
            
            $allPlans = $allPlans . $planListEntry;
            
		}
	}
    
    
    
    //--------------------------------------------------------------------//
    $exerciseList = "";
    
    $sql ="SELECT id, name FROM tb_exercise WHERE user_id = $userid;";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

            $optionToList = '
                <option value="'. $row["id"] .'">'. $row["name"] .'</option>
            ';

            $exerciseList = $exerciseList . $optionToList;
		}
	}
    
    $sql2 = "SELECT `id`,`name`,`description` FROM `tb_plan` WHERE `creator` = $userid";
            
	$result2 = $mysqli->query($sql2);
    
    $planList = "";
	
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
            
            $i = 1;
            $planID = $row2['id'];
            $planName = $row2['name'];
            $planDescription = $row2['description'];
            $planExercises = "";
            
            $sql3 =  "SELECT phe.id, phe.plan_id, phe.exercise_id, phe.repetitions, phe.sets, e.name FROM `tb_planhasexercise` AS phe
                    LEFT JOIN tb_exercise AS e ON e.id = phe.exercise_id
                    WHERE plan_id = $planID;";
            
            $result3 = $mysqli->query($sql3);
	
            if ($result3->num_rows > 0) {
                while($row3 = $result3->fetch_assoc()) {
                    
                    $exerciseID = $row3['exercise_id'];
                    $planhasexID = $row3['id'];
                    $exerciseReps = $row3['repetitions'];
                    $exerciseSets = $row3['sets'];
                    $exerciseName = $row3['name'];
                    
                    $ownPlanExercise = '
                        <div planhasexID="'. $planhasexID .'" listId="'.$i.'" planID="'. $planID .'" exerciseID="'. $exerciseID .'" class="col-lg-12 card listExercise">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label class="exerciseListName" style="padding-top: 5px;">'. $exerciseName .'</<label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="form-group row" style="margin-bottom: 0;">
                                    <label style="padding-right: 0;" for="reps" class="col-sm-6 col-form-label">Ausführungen:</label>
                                        <div class="col-sm-6">
                                            <input planID="'. $planID .'" exerciseID="'. $exerciseID .'" type="number" class="form-control listReps fListdescription" id="reps" value="'. $exerciseReps .'">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-lg-4">
                                    <div class="form-group row" style="margin-bottom: 0;">
                                        <label for="sets" style="padding-right: 0;" class="col-sm-7 col-form-label">Wiederholungen:</label>
                                        <div class="col-sm-5">
                                            <input planID="'. $planID .'" exerciseID="'. $exerciseID .'" type="number" class="form-control listSets fListdescription" id="sets" value="'. $exerciseSets .'">
                                        </div>
                                    </div>
                                </div>
                                
                                <!--
                                <div class="col-lg-1">
                                    <i style="padding-top: 10px; padding-left: 5px; font-size: larger;" class="fa fa-trash text-center" aria-hidden="true"></i>
                                </div>
                                -->
                                
                            </div>
                        </div>
                        <br/>
                    ';
                    
                    $planExercises = $planExercises . $ownPlanExercise;
                    $i = $i + 1;
                    
                }
            }
            
            
            
            $ownPlan = '
                <div planID="'. $planID .'" class="card col-lg-12 userPlan">
                    <div class="row">
                        <div planID="'. $planID .'" class="col-lg-12 headInfo" style="cursor: pointer;">
                            <b>'. $planName .'</b><i class="fa fa-chevron-down" style="float: right;margin-top: 5px;" aria-hidden="true"></i>
                        </div>
                        <div planID="'. $planID .'" class="detailed col-lg-12" style="display: none;">
                            <hr/>
                            <div class="row">
                                <div class="col-lg-12">
                                    Beschreibung: <br> <textarea planID="'. $planID .'" id="" style="height: 80%;margin-top: 0px; margin-bottom: 0px;" class="form-control planDescription fListdescription">'. $planDescription .'</textarea><br/>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div planID="'. $planID .'" class="plansExercises">
                                        
                                        '. $planExercises .'
                                        
                                    </div>
                                                
                                    <!--
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <i class="fa fa-plus-square" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i>
                                            <i class="fa fa-minus-square" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    -->
                                        
                                </div>
                                
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a planID="'. $planID .'" style="display: none;" class="btn btn-lg btn-primary btn-block saveChangesButton">Änderungen speichern</a><br/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a planID="'. $planID .'" class="btn btn-lg btn-primary btn-block deletePlanButton"><i class="fa fa-trash" aria-hidden="true"></i> Plan löschen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            ';
            
            $planList = $planList . $ownPlan;
            
		}
	}
    
?>

<h2>Meine <span class="text-primary">Pläne</span></h2>
<hr/>
<h3>Favoriten</h3>

<?php echo $allPlans; ?>

<hr/>



<h3>Eigene</h3>
    <div id="userPlanList">
        
        <?php if($planList){echo $planList;} else {echo "Du hast noch keinen Plan erstellt.";}; ?>
        
    </div>
<hr/>



<h3>Plan erstellen</h3>
<div class="alert alert-danger" id="error" style="display: none;"></div>
<div class="card col-lg-12">
	<div class="row">
		<div class="col-lg-5">
			<p class="text-center" style="margin-top: 10px;">Name des Plans:</p>
		</div>
		<div class="col-lg-7">
			<input class="form-control" id="fplanName" style="width: 100%;" type="text"/>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr style="margin-top: 0;"/></div></div>
	<div class="row">
		<div class="col-lg-12">
			Beschreibung: <br> <textarea id="fplanDescription" class="form-control"></textarea>
		</div>
	</div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12 allExercise" id="">
			<div exerciseListID="1" id="exercise" style="margin-bottom: 10px; display: none;" class="card col-lg-12 exercise">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="sel1">Übung:</label>
							<select class="form-control exerciseSelect" id="sel1">
                                <option></option>
								<?php if($exerciseList){echo $exerciseList;} else { echo "<option>Du hast noch keine Übungen definiert.</option>";} ?>
							</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="reps">Ausführungen:</label>
							<input exerciseListID="1" type="number" class="form-control reps" id="reps">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="sets">Wiederholungen:</label>
							<input type="number" class="form-control sets" id="sets">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-lg-12">
            <i class="fa fa-plus-square addExerciseForm" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i>
            <i class="fa fa-minus-square deleteExerciseForm" style="font-size: 40px;margin: 2px;" aria-hidden="true"></i>
        </div>
    </div>
	<div class="row"><div class="col-lg-12"><hr/></div></div>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-lg btn-primary btn-block" id="addNewPlan">Plan hinzufügen</a>
		</div>
	</div>
</div>
<script src="./modul/userPlan/userPlan.js"></script>