<?php

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value
class Api {

    protected static $requests = array();

    public function add_request($method, $url, $data = false){
        $request = array(
            "method" => $method,
            "url" => $url,
            "data" => $data
        );
        array_push(self::$requests, $request);
    }

    public function call_multi_api(){
        //console_log(self::$requests);
        $curl_requests = array();
        $multi_curl = curl_multi_init();
        foreach(self::$requests as &$request){
            $curl_request = self::create_request($request['method'], $request['url'], $request['data']);
            array_push($curl_requests, $curl_request);
        }
        //add curl multi handles for async requests
        foreach($curl_requests as &$curl_request){
            curl_multi_add_handle($multi_curl, $curl_request);
        }
        
        $active = null;

        do {
        curl_multi_exec($multi_curl, $active);
        }
        while($active);

        $result = array();
        //get responses from each request
        foreach($curl_requests as &$curl_request){
            array_push($result, curl_multi_getcontent($curl_request));
            curl_multi_remove_handle($multi_curl, $curl_request);
        }

        //close curl connections
        curl_multi_close($multi_curl);
        foreach($curl_requests as &$curl_request){
            curl_close($curl_request);
        }            
        self::$requests = array();
        return $result;
    }
    
    function create_request($method, $url, $data){
        $curl = curl_init();
        $data = json_encode($data);
        
        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
    
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
    
        // Optional Authentication:
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 2);

        return $curl;
    }
}
function call_api($method, $url, $data = false)
{
    $curl = curl_init();
    $data = json_encode($data);
    
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 2);

    $result = curl_exec($curl);

    console_log(curl_error($curl));
    curl_close($curl);

    return $result;
}

?>