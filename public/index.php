<?php

require_once '../vendor/autoload.php';

$client = new Client(filter_input(INPUT_GET, '/path'));


$client = new GuzzleHttp\Client();

$res = $client->request('GET', 'https://api.github.com/user', [
    'auth' => ['user', 'pass']
]);

echo $res->getStatusCode();
echo $res->getHeader('content-type')[0];
echo $res->getBody();

#?/path=data&/column=id,name

$path = explode('.', trim(filter_input(INPUT_GET, '/path'), " \t\n\r\0\x0B."));
$json = '';


foreach ($path as $step) {
    if (isset($json[$step])) {
        $json = $json[$step];
    }
}
