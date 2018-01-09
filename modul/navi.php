<?php

	//Session und Datenbankverbindung einbinden
	include("session.php");
	include("database/database.php");
 
	//Profilbild-Pfad des Users auslesen
	$sql ="SELECT pbPath FROM tb_user WHERE id = '$userid'";
	$result = $mysqli->query($sql);
	
	//Ergebnis in Variabel speichern
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$pbPath = $row["pbPath"];
		}
	}
	
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" style="display: none;">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">F U C</span>
        <span class="d-none d-lg-block">
			<img alt="Profilbild" class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php if($pbPath != NULL){ echo "modul/editProfile/" . $pbPath; } else { echo "img/profile.jpg";}?>" alt="" style="display: none;" id="sideNavPic">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" style="display: none;" id="sideNavItem">
                
			<?php
                
				//Module aus der Datenbank lesen
                $sql = "SELECT * FROM tb_modul";
                $result = $mysqli->query($sql);
                
				//Jedes Modul als formatierten link ausgeben, oder Fehlermeldung ausgeben
                if (isset($result) && $result->num_rows > 0) {
					
                    while($row = $result->fetch_assoc()) {
                        $link = '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="'. $row["file_path"].'">'. $row["title"] .'</a></li>';
                        echo $link;
                    }
					
                } else {
                    echo "Fehler beim Auslesen der Navigationspunkte.";
                }
                
            ?>
	
        </ul>
    </div>
</nav>