--TEST--
CurlUrl::setOptArray() - tests setting multiple cURL options
--EXTENSIONS--
curl
--FILE--
<?php

include 'server.inc';
$host = curl_cli_server_start();
if (!empty($host)) {
    $url = "{$host}/get.inc?test=get";
} else {
    $tempname = tempnam(sys_get_temp_dir(), 'CURL_HANDLE');
    $url = 'file://'. $tempname;
    file_put_contents($tempname, "Hello World!\nHello World!");
}

$ch = new CurlHAndle();

$options = array (
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1
);

ob_start(); // start output buffering

$ch->setOptArray($options);
$returnContent = $ch->exec();
unset($ch);

var_dump($returnContent);
isset($tempname) and is_file($tempname) and @unlink($tempname);

?>
--EXPECT--
string(25) "Hello World!
Hello World!"
