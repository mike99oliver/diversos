<?php 

function safe_print($value) {
	$value .= "";
	return strlen($value) > 3 && (strpos($value, "0") !== false) ? ltrim($value, "0") : (strlen($value) == 0 ? "0" : $value);
}

if(!isset($_SESSION)) {
	session_start();
}

if(isset($_SESSION['standby'])) {

	// There is all your configuration
	$_SESSION['standby'] = $_SESSION['standby']+1;

	$ad_ddos_query  = 5;
	$ad_check_file  = 'check.txt';
	$ad_all_file    = 'all_ip.txt';
	$ad_black_file  = 'black_ip.txt';
	$ad_white_file  = 'white_ip.txt';
	$ad_temp_file   = 'ad_temp_file.txt';
	$ad_dir         = 'anti_ddos/files';
	$ad_num_query   = 0;
	$ad_sec_query   = 0;
	$ad_end_defense = 0;
	$ad_sec         = date("s");
	$ad_date        = date("is");
	$ad_defense_time = 100;
		

	$config_status = "";
	function Create_File($the_path){
		$handle = fopen($the_path, 'a+') or die('Cannot create file:  '.$the_path);
		return "Creating ".$the_path." .... done";
	}


	// Checking if all files exist before launching the cheking
	$config_status .= (!file_exists("{$ad_dir}/{$ad_check_file}")) ? Create_File("{$ad_dir}/{$ad_check_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_check_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_temp_file}")) ? Create_File("{$ad_dir}/{$ad_temp_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_temp_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_black_file}")) ? Create_File("{$ad_dir}/{$ad_black_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_black_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_white_file}")) ? Create_File("{$ad_dir}/{$ad_white_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_white_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_all_file}")) ? Create_File("{$ad_dir}/{$ad_all_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_all_file}<br>";

	if(!file_exists ("{$ad_dir}/../anti_ddos.php")){
		$config_status .= "anti_ddos.php does'nt exist!";
	}

	if (!file_exists("{$ad_dir}/{$ad_check_file}") or 
			!file_exists("{$ad_dir}/{$ad_temp_file}") or 
				!file_exists("{$ad_dir}/{$ad_black_file}") or 
					!file_exists("{$ad_dir}/{$ad_white_file}") or 
						!file_exists("{$ad_dir}/{$ad_all_file}") or 
							!file_exists ("{$ad_dir}/../anti_ddos.php")) {

								$config_status .= "Some files does'nt exist!";
								die($config_status);
	}

	// TO verify the session start or not
	require ("{$ad_dir}/{$ad_check_file}");

	if ($ad_end_defense and $ad_end_defense> $ad_date) {
		require ("{$ad_dir}/../anti_ddos.php");
	} else {
		$ad_num_query = ($ad_sec == $ad_sec_query) ? $ad_num_query++ : '1 ';
		$ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");

		$ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense='.safe_print($ad_date + $ad_defense_time).'; ?>' : '<?php $ad_num_query='. safe_print($ad_num_query) .'; $ad_sec_query='. safe_print($ad_sec) .'; ?>';

		fputs ($ad_file, $ad_string);
		fclose ($ad_file);
	}
}else{

	$_SESSION['standby'] = 3;
	
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	header("refresh:4,../wallet/");
	 exit();

}
?>
