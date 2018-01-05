<?php

    include("session.php");
	include("../database/database.php");    
    
    
    $allPlans = "";
     
    $sql1 = "SELECT p.id, p.`name`, p.`description`, u.pbPath, u.username FROM tb_plan AS p
    LEFT JOIN tb_user AS u ON u.id = p.creator
    WHERE p.creator != $userid";
    
    $result = $mysqli->query($sql1);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            
            $planID = $row['id'];
            $planName = $row['name'];
            $planDescription = $row['description'];
            $userPicPath = $row['pbPath'];
            $creatorName = $row['username'];
            $i = 1;
            
            $checkFav = $mysqli->query("SELECT * FROM `tb_userhasfavorite` WHERE `user_id` = $userid AND `plan_id` = $planID");
            if ($checkFav->num_rows == 0) {
                $starEntry = '<i planID="'. $planID .'" isfav="false" class="fa fa-star-o favStar" style="margin-top: 0px; font-size: 30px;" aria-hidden="true"></i>';
            } else {
                $starEntry = '<i planID="'. $planID .'" isfav="true" class="fa fa-star favStar" style="margin-top: 0px; font-size: 30px;" aria-hidden="true"></i>';
            }
            
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
                    <div planID="'. $planID .'" class="col-lg-4 headInfo">
                        <div class="row">
                            <div class="col-lg-3" style="text-align:center;">
                                <img style="margin-left:auto;margin-right:auto;height: 50px;" class="img-fluid img-profile rounded-circle mx-auto mb-2" src="'. $userPicPath .'">
                            </div>
                            <div class="col-lg-9" style="padding-top: 10px;">
                                <span>Ersteller: '. $creatorName .'</span>
                            </div>
                        </div>
                    </div>
                    <div planID="'. $planID .'" class="col-lg-6 headInfo" style="padding-top: 10px;">
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
    
?>

<h2>Alle <span class="text-primary">Pläne</span></h2>
<hr/>

<?php echo $allPlans; ?>

<script src="./modul/publicPlan/publicPlan.js"></script>