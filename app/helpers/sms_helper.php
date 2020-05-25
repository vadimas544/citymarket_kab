<?php

function send_request($url, $json_value, $user, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    //echo $output;
}

function sendSms($phone){
        $user = 'itdep@legion2015.com';
        $password = 'fgtERT587';
        $send_sms_url = 'https://esputnik.com/api/v1/message/sms';

        $from = 'Pchelka';
        $gen_pass = substr(md5(time()), 0, 4);
        $_SESSION['sms_pass'] = $gen_pass;
        $text = "Ваш пароль: $gen_pass";

        $json_value = new stdClass();
        $json_value->text = $text;
        $json_value->from = $from;
        $json_value->phoneNumbers = array($phone);

        send_request($send_sms_url, $json_value, $user, $password);

    }