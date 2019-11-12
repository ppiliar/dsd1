<?php

include("api.php");

//send request to update db on remote
//if it is not possible to connect to remote server save to file
function push($query){
    $data = array(
        "query" => $query
    );
    $path = "/db-novy/logix/update.php";
    $config = parse_ini_file('config.ini'); 
    $remotes = $config['remotes'];
    $api = new Api();
    foreach($remotes as &$remote){
        $url = $remote . $path;
        $api->add_request("POST", $url, $data); 
    }
    $responses = $api->call_multi_api();
    $index = 0;
    foreach($remotes as &$remote){
        if(!$responses[$index]){
            log_failure($remote, $query);
        } 
        $index++;
    }

}

//save failed remote sql query to file
function log_failure($remote, $query){
    if(!file_exists('log.bin')){
        $data = array( "logs" => array());
        file_put_contents('log.bin', json_encode($data));
    }else{
        $data = file_get_contents('log.bin');
        $data = json_decode($data, true);
    }
    $logs = $data['logs'];

    $log = array(
        "remote" => $remote,
        "query" => $query
    );
    array_push($logs, $log);
    $data['logs'] = $logs;
    $data = json_encode($data);
    file_put_contents("log.bin", $data, LOCK_EX);    
}    

//get change logs from remote servers
function pull($db){
    $config = parse_ini_file('config.ini');
    $data = array( "remote" => $config['ip']);
    $remotes = $config['remotes'];
    $path = "/db-novy/logix/sync.php";
    $api = new Api();
    foreach($remotes as &$remote){
        $url = $remote . $path;
        $api->add_request("POST", $url, $data); 
    }
    $responses = $api->call_multi_api();
    foreach($responses as &$response){
        if($response){
            $response = json_decode($response, true);
            if($response['status'] === 'update'){
                update($response['logs'], $db);
            }
        }  
    }    
}

function update($logs, $db){
    foreach($logs as &$log){
        $db->query($log['query']);
    }
}