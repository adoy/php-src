--TEST--
curl_setopt() with error
--EXTENSIONS--
curl
--FILE--
<?php

try {
	(new CurlHandle())->setOpt(CURLOPT_CONNECTTIMEOUT, -10);
} catch (CurlException $e) {
	var_dump($e->getCode(), $e->getMessage());
}

?>
==DONE==
--EXPECT--
int(43)
string(65) "Unable to set option: A libcurl function was given a bad argument"
==DONE==
