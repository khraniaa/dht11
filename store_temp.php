<?php

/*if (isset($_POST["data"])) {*/
	/*   $temperature = $_POST["data"] ;
	$filename_temperature = "data.json" ;

  $op = file_put_contents($filename_temperature, $temperature) ;
  if (! $op) {
    echo "store error" ;
  }

} else {
  echo "data error" ;
}
*/
  $data_json = file_get_contents("php://input");
  $filename_temperature = "data.json" ;
  // verification json
 	$data = json_decode($data_json);
 	if (! $data){
 		http_response_code(415);
 		exit();
 	}
 	elseif (! $data->temperature || ! $data->humidite){
 		http_response_code(400);
 		exit();
 	}
 	$op = file_put_contents($filename_temperature, $data_json);
 	if (! $op){
 		http_response_code(500);
 		exit();
 	}
?>
