<?php

	//Session und Datenbankverbindung einbinden
	include("session.php");
	include("../database/database.php");
 
	//Benötigte Daten aus der Datenbank lesen	
	$sql ="SELECT firstname, lastname, email, reg_date, pbPath FROM tb_user WHERE id = '$userid'";
	$result = $mysqli->query($sql);
	
	//Wird ausgegeben, wenn der firstname nicht gefunden wird
	$firstname = "404";
	
	//Daten in einer Tabelle darstellen
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$table = '
			<tr><td>Benutzername</td><td>'. $username .'</td></tr>
			<tr><td>Vorname</td><td><input class="form-control change" id="Ffirstname" type="text" value="'. $row["firstname"] .'"/></td></tr>
			<tr><td>Nachname</td><td><input class="form-control change" id="Flastname" type="text" value="'. $row["lastname"] .'"/></td></tr>
			<tr><td>E-Mail</td><td><input class="form-control change" id="Femail" type="text" value="'. $row["email"] .'"/></td></tr>
			<tr><td>Reg. Datum</td><td>'. $row["reg_date"] .'</td></tr>
			';
			
			//Variabeln definieren
			$pbPath = $row["pbPath"];
			$firstname = $row["firstname"];
			
		}
	}
	
	//Mögliche Fehlermeldung definieren
	$errorPic = "";
	if(isset($_GET['errorPic'])){
		$errorPic = '
		<div class="alert alert-danger" id="errorPic" style="display: none;">'. $_GET['errorPic'] .'</div>
		';
	}

 
?>

<h2>Profil von <span id="usersName" class="text-primary"><?php echo $firstname; ?></span></h2>

<hr/>
<br/>
<div class="row">
    <div class="col-lg-6">
        <h3>Benutzerinformationen bearbeiten</h3>
        <table class="table table-hover table-responsive">
            <tbody>
                <?php if($table){echo $table;} else {echo "Fehler beim auslesen der Daten.";} ?>
            </tbody>
        </table>
		<a id="saveChangesButton" style="display: none;" class="btn btn-lg btn-primary btn-block">Änderungen speichern</a><br/>
		<div class="alert alert-danger" id="errorCatch" style="display: none;">
			<strong>Fehler</strong> Indicates a dangerous or potentially negative action.
		</div>
		<div class="changePassForm" style="display: none;">
			<table class="table table-hover table-responsive">
				<tbody>
					<tr><td>Neues Passwort</td><td><input class="form-control" id="FnewPass" type="password"/></td></tr>
					<tr><td>Passwort bestätigen</td><td><input class="form-control" id="FnewPass2" type="password"/></td></tr>
				</tbody>
			</table>
			<a id="newPassButton" class="btn btn-lg btn-primary btn-block">Bestätigen</a><br/><br/>
		</div>
        <a id="changePassButton" class="btn btn-lg btn-primary btn-block">Passwort ändern</a><br/><br/>
    </div>
    <div class="col-lg-6">
		<div class="row" id="profPic">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<img class="img-fluid img-profile rounded-circle mx-auto mb-2" alt="Profilbild" src="<?php if($pbPath != NULL){ echo "modul/editProfile/" . $pbPath; } else { echo "img/profile.jpg";}?>" alt="">
			</div>
			<div class="col-lg-3"></div>
		</div>
		<?php if($errorPic){echo $errorPic;} ?>
        <div class="row">
            <div class="col-lg-6">
                <a id="deletePic" class="btn btn-lg btn-primary btn-block">Bild löschen</a><br/>
            </div>
            <div class="col-lg-6">
                <a id="changePic" class="btn btn-lg btn-primary btn-block">Bild ändern</a><br/>
            </div>
        </div>
        <div id="picUploader" style="display: none;">
			<form action="modul/editProfile/editPic.php" method="post" enctype="multipart/form-data">
				<input name="picData" id="picData" type="file" size="50" accept="image/*" required><br/><br/>
				<button id="sendPic" class="btn btn-lg btn-primary btn-block">Hochladen</button>
			</form>
        </div>
        
    </div>
</div>
<script src="./modul/editProfile/editProfile.js"></script>