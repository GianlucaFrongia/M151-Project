<?php
	
	//Session und Datenbankverbindung einbinden
	include("./../session.php");
	include("./../../database/database.php");
	
	//Globale Variabeln initialisieren
    $upload_folder = 'userpb/'; //Das Upload-Verzeichnis
	$filename = pathinfo($_FILES['picData']['name'], PATHINFO_FILENAME);
	$extension = strtolower(pathinfo($_FILES['picData']['name'], PATHINFO_EXTENSION));
	 
	//Überprüfung der Dateiendung
	$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
	if(!in_array($extension, $allowed_extensions)) {
		errorPic("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
	}
	 
	//Überprüfung der Dateigröße
	$max_size = 20000*1024; //500 KB
	if($_FILES['picData']['size'] > $max_size) {
		errorPic("Bitte keine Dateien größer 20MB hochladen");
	}
	 
	//Überprüfung dass das Bild keine Fehler enthält
	if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
		$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$detected_type = exif_imagetype($_FILES['picData']['tmp_name']);
		if(!in_array($detected_type, $allowed_types)) {
			errorPic("Nur der Upload von Bilddateien ist gestattet");
		}
	}
	 
	//Pfad zum Upload
	$new_path = $upload_folder.$filename.'.'.$extension;
	 
	//Neuer Dateiname falls die Datei bereits existiert
	if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
		$id = 1;
		do {
			$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
			$id++;
		} while(file_exists($new_path));
	}
	
	//Funktion welche bei einem Error diesen per GET an die Seite weiterleitet
	function errorPic($error){
		$head = "Location: ./../../dashboard.php?tab=editProfile&errorPic=" . $error;
		header($head);
		die();
	}
	
	//Alles okay, verschiebe Datei an neuen Pfad und kehre zur Seite zurück
	move_uploaded_file($_FILES['picData']['tmp_name'], $new_path);
	
	$query = "UPDATE tb_user SET pbPath = ? WHERE username='$username'";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $new_path);
    $stmt->execute();
    $mysqli->close();
	
	header("Location: ./../../dashboard.php?tab=editProfile");

?>