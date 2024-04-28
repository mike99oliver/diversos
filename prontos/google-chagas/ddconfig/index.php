<?php
try {
	if (!file_exists('anti_ddos/start.php')) {
		throw new Exception ('anti_ddos/start.php does not exist');
	}else{
		require "anti_ddos/start.php";
	}
} 

catch (Exception $ex) {
	header('Location: https://www.google.com/');
}

?>