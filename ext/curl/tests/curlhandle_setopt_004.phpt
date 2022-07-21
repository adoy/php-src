--TEST--
CurlHandle::setOpt() with invalid int strict
--EXTENSIONS--
curl
--FILE--
<?php

declare(strict_types=1);

try {
	(new CurlHandle())->setOpt(CURLOPT_BUFFERSIZE, "2");
} catch (TypeError $e) {
	var_dump($e->getMessage());
}
try {
	(new CurlHandle())->setOpt(CURLOPT_BUFFERSIZE, "OK");
} catch (TypeError $e) {
	var_dump($e->getMessage());
}

?>
==DONE==
--EXPECT--
string(105) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_BUFFERSIZE must be of type int, string given"
string(105) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_BUFFERSIZE must be of type int, string given"
==DONE==
