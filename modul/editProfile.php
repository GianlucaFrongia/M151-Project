<?php
 include("session.php");
 include("../database/database.php");
 
 $sql ="SELECT firstname, lastname, email, reg_date FROM tb_user WHERE username = '$username'";
 $result = $mysqli->query($sql);
 
 $firstname = "404";
 
 if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$table = '
		<tr><td>Benutzername</td><td>'. $username .'</td></tr>
		<tr><td>Vorname</td><td><input class="form-control" type="text" value="'. $row["firstname"] .'"/></td></tr>
		<tr><td>Nachname</td><td><input class="form-control" type="text" value="'. $row["lastname"] .'"/></td></tr>
		<tr><td>E-Mail</td><td><input class="form-control" type="text" value="'. $row["email"] .'"/></td></tr>
		<tr><td>Reg. Datum</td><td>'. $row["reg_date"] .'</td></tr>
		';
		$firstname = $row["firstname"];
		}
}
 
?>

<h2>Profil von <span class="text-primary"><?php echo $firstname; ?></span></h2>

<hr/>
<br/>
<div class="row">
    <div class="col-lg-6">
        <h3>Benutzerinformationen bearbeiten</h3>
        <table class="table table-hover table-responsive">
            <tbody>
                <?php

                    echo $table;

                ?>
            </tbody>
        </table>
        <a id="changePass" class="btn btn-lg btn-primary btn-block">Passwort ändern</a><br/><br/>
    </div>
    <div class="col-lg-6">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        <div class="row">
            <div class="col-lg-6">
                <a id="deletePic" class="btn btn-lg btn-primary btn-block">Bild löschen</a></br>
            </div>
            <div class="col-lg-6">
                <a id="changePic" class="btn btn-lg btn-primary btn-block">Bild ändern</a><br/>
            </div>
        </div>
    
        <div id="picUploader" style="display: none;">
            <input id="picData" type="file" size="50" accept="image/*"></br></br>
            <a id="sendPic" class="btn btn-lg btn-primary btn-block">Bestätigen</a>
        </div>
        
    </div>
</div>
<script src="./modul/editProfile/editProfile.js"></script>