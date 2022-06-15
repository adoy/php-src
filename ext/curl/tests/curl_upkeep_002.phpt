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
$ch->setOpt(CURLOPT_URL,$url);
$ch->setOpt(CURLOPT_RETURNTRANSFER,true);
$ch->setOpt(CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_2_0);
$ch->setOpt(CURLOPT_SSL_VERIFYPEER,false);
$ch->setOpt(CURLOPT_UPKEEP_INTERVAL_MS, 200);
if ($ch->exec()) {
    usleep(300);
    var_dump($ch->upkeep());
}
?>
--EXPECT--
bool(true)
