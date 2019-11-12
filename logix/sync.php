<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
//include_once '../config/database.php';
//include_once '../objects/product.php';
include_once 'db.php';

// get database connection
$db = new Database();


// get id of product to be edited
$data = json_decode(file_get_contents("php://input"), true);
$remote = $data['remote'];

if(!file_exists('../log.bin')){
    http_response_code(200);
    echo json_encode(array("status" => "ok"));
}else{
    $data = file_get_contents('../log.bin');
    $data = json_decode($data, true);

    $logs = $data['logs'];
    $respLogs = array();
    $newLogs = array();

    foreach($logs as &$log){
        if($log['remote'] == $remote){
            array_push($respLogs, $log);
        }else{
            array_push($newLogs, $log);
        }
    }
    if(empty($respLogs)){
        http_response_code(200);
        echo json_encode(array("status" => "ok"));
    }else{
        $response = array(
            "status" => "update",
            "logs" => $respLogs
        );
        http_response_code(200);
        echo json_encode($response);
    }
    $data['logs'] = $newLogs;
    $data = json_encode($data);
    file_put_contents('../log.bin', $data, LOCK_EX);
}
?>