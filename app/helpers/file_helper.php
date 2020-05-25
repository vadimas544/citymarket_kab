<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24.05.2020
 * Time: 19:26
 */

function get_code_client(){
    $file = APPROOT . '/code_clients.txt';

    $lines = file($file);

    return $lines[0];
}

function del_code_client(){

    $filename = APPROOT . '/code_clients.txt';

    $arr = file($filename);

    unset($arr[0]);
    file_put_contents($filename, $arr);

    //fputs($fp,implode("",$file));

    //fclose($fp);

}