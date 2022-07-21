--TEST--
curl_upkeep() function
--EXTENSIONS--
curl
--SKIPIF--
<?php
if (getenv("SKIP_ONLINE_TESTS")) die("skip online test");
if (curl_version()['version_number'] < 0x073e00) die('skip requires curl >= 7.62.0');
?>
--FILE--
<?php

$url = "https://example.com";

$ch = new CurlHandle();
$ch->setOpt(CURLOPT_URL,$url)
	->setOpt(CURLOPT_RETURNTRANSFER,true)
	->setOpt(CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_2_0)
	->setOpt(CURLOPT_SSL_VERIFYPEER,false)
	->setOpt(CURLOPT_UPKEEP_INTERVAL_MS, 200);

if ($ch->exec()) {
    usleep(300);
    $ch->upkeep();
	echo '==DONE==';
}
?>
--EXPECT--
==DONE==
