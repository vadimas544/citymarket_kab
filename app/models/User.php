<?php

class User
{
    private $api;

    public function __construct()
    {
        $this->api = new API();
    }

    public function register($data, $code_client){
        //echo $code_client;
        //print_r($data);
        $res = $this->api->register($data, $code_client);
        return true;
        //del_code_client();
        //$response = json_decode($res, true);

        //var_dump($response);
//        return true;
    }

    public function sendSms($phone){
        sendSms($phone);
        redirect('users/sms');

    }

    public function checkSmsCode($code){
        if($code == $_SESSION['sms_pass']){
            //echo 2;
            //die();
            return true;
        }
    }

    public function checkPhone($phone){
        $res = $this->api->info($phone);
        if($res){
            return true;
        }else{
            return false;
        }
        //$code_client = $response['response']['client']['code_client'];

        //echo $code_client;

        //return $code_client;
    }



    public function update($code_client, $phone, $password){
        $this->api->update($code_client, $phone, $password);
        //var_dump($this->api);
    }

    public function getPassword($phone)
    {
        $res = $this->api->info($phone);
        $response = json_decode($res, true);

        $password = $response['response']['client']['password'];

        return $password;
    }

    public function cabinetInfo($code_client){
        $info = $this->api->cabinetInfo($code_client);
        $response = json_decode($info, true);
        return $response;
    }

    //Login User

    public function login($phone, $password)
    {

        $info = $this->api->info($phone);

        $info = json_decode($info, true);

        //echo '<pre>';
        //print_r($info);
        $hashed_password = $info['response']['client']['password'];
        //echo $hashed_password;

        $new_pass = password_hash($password, PASSWORD_DEFAULT);
        //echo $new_pass;

        //Password matches
        if(password_verify($password, $hashed_password)){
            return true;
        }else{
            return false;
        }
    }


//    public function sms($phone){
//
//        //Check for POST
//        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            //Process Form
//
//            send_sms($phone);
//
//        }else {
//            //Init data
//            $data = [
//                'password' => '',
//                'password_error' => '',
//            ];
//
//
//            //Load view
//            $this->view('users/sms', $data);
//        }
//    }

    public  function register_continue($data){
        return $data;
    }

}