<?php
$loader = require __DIR__.'/vendor/autoload.php';
$loader->addPsr4('Classes\\', __DIR__.'/Classes/');

$request = new \Classes\Request\Request($_SERVER);

//$result = $request->getCookies('value');
//$result = $request->getHeaders();
//$result = $request->getRequestMethod();
//$result = $request->getParams('');

$response = new \Classes\Response\Response();

//$response->setCode(321);
//$result = $response->getCode();

//$header = [
//	'Content-Type' => 'text/html; charset=utf-8',
//	'Vary' => 'Accept-Encoding',
//];
//$response->setHeaders($header);
//$header = [
//	'Server' => 'nginx/1.10.3'
//];
//$response->setHeaders($header);
//$result = $response->getHeaders('Vary');

//$cookie = [
//	'v1' => 'qwertyui',
//	'v2' => 'asdfghjk'
//];
//$response->setCookies($cookie);
////
//$result = $response->getCookies('v1');

//$response->setContent('If the optional search_value is specified, then only the keys for that value are returned. Otherwise, all the keys from the array are returned.');
//$result = $response->getContent();