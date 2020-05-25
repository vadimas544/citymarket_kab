<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16.01.2020
 * Time: 12:00
 * API Base class
 * Connect to API
 */

class API {


    public $user = API_USER;
    public $pass = API_PASS;
    public $api;


    public function register($data, $code_client){

        $code_client = intval($code_client);
        $data = [
            'request' => [
                'client' => [
                    'code_client' => $code_client,
                    'phone' => $data['phone'],
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'password' => $data['password']
                ]
            ]
        ];

        //echo '<pre>';
        //print_r($data);
        $data = json_encode($data);


        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, API_URL_UPDATE);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            echo $output;
        }
    }

    public function update($code_client, $phone, $password){
        $data = [
            'request' => [
                    'client' => [
                        'code_client' => $code_client,
		 			    'phone' => $phone,
                        'password' => $password
                        ]
                ]
            ];


        $data = json_encode($data);
        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, API_URL_UPDATE);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            echo $output;
        }
    }


    public function info($phone){

        $phone = intval($phone);
        $data = [
            'request' => [
                'phone' => $phone
            ]
        ];

        $data = json_encode($data);
        //var_dump($data);
        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, API_URL_INFO);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            return $output;
        }
    }

    public function cabinetInfo($code_client){
        $data = [
            'request' => [
                'code_client' => $code_client
            ]
        ];

        $data = json_encode($data);
        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, API_URL_INFO);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            return $output;
        }
    }

    public function account(){

    }


    public function get($num, $offset)
    {
        $data = [
            'request' => [
                'num' => $num,
                'offset' => $offset
            ]
        ];

        $data = json_encode($data);
        if (!function_exists('curl_init')) {
            if (!function_exists('curl_init')) {
                die('cURL not available!');
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, API_URL_GET);
            curl_setopt($curl, CURLOPT_FAILONERROR, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, 'API_USER:API_PASS');
            curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $output = curl_exec($curl);
            if ($output === FALSE) {
                echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
            } else {
                echo $output;

            }
        }
    }
}


