<?php 
function start_session() {
	session_start();
	session_regenerate_id(true);
	if (!empty($_SESSION['user']) && $_SESSION['user']['time'] < time() - 180) {
		 session_destroy();
		 session_start();
	}
}

function set_session($id, $username, $loggedIn , $time){
	$_SESSION['user'] = array('id' =>  $id, 'username' => $username , 'loggedIn' => $loggedIn, 'time' => $time);
}


function destroy_session(){
	$_SESSION =  array();
	session_destroy();
	header('login.php');
}


?>