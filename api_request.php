<?php
/**
 * Simple cURL request script
 *
 * Test if cURL is available, send request, print response
 *
 *   php curl.php
 */
$login = 'test2';
$password = '654321';

$data = [
	'request' => [
		'barcode' => '300001'
	]
];

$data = json_encode($data);

if(!function_exists('curl_init')) {
	die('cURL not available!');
}
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://vpn.infsys.biz:5657/cds/client/info');
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, "$login:$password");

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
