<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" style="display: none;">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="" style="display: none;" id="sideNavPic">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" style="display: none;" id="sideNavItem">
                
                <?php
                    
                    $sql = "SELECT * FROM tb_modul";
                    $result = $mysqli->query($sql);
                    
                    if (isset($result) && $result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $link = '
                            <li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="'. $row["file_path"].'">'. utf8_encode($row["title"]) .'</a>
                            </li>
                            ';
                            echo $link;
                            
                        }
                    } else {
                        echo "0 results";
                    }
                
                ?>
        <a href="login/loggout.php" name="logout" id="logout" class="btn btn-md btn-primary btn-block" type="submit" value"register">Loggout</a>
        </ul>
      </div>
    </nav>