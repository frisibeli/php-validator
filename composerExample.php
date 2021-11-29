<?php
require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler(STDOUT, Monolog\Logger::WARNING));
$log->warning('Foo');

$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'http://167.71.56.154:81/getConversation.php');

echo $res->getBody();