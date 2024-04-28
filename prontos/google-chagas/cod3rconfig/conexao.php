<?php

// function DBEscape($dados) {
// 	$link = DBConnect();
	
// 	if(@!in_array($dados)) {
// 		$dados = @mysqli_real_escape_string($link, $dados);
		
// 	}else{
// 		$arr = $dados;
// 		foreach ($arr as $key => $value){
// 			$key   = @mysqli_real_escape_string($link, $key);
// 			$value = @mysqli_real_escape_string($link, $value);
//             $dados[$key] = $value;			
// 		}	
// 	}
// 	DBClose($link);
// 	return $dados;
// }

function DBClose($link) {
	@mysqli_close($link) or die (mysqli_error($link));
}

function DBConnect() {
	$link = @mysqli_connect(DB_HOTSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die (mysqli_error($link));
	//$link = @mysqli_connect('localhost', 'root', '', 'db2') or die (mysqli_error($link)); 
	mysqli_set_charset($link, DB_CHARSET) or die (mysqli_error($link));
	//mysqli_set_charset($link, 'utf8') or die (mysqli_error($link));

return $link;
	
}

?>
