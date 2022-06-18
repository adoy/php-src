--TEST--
CurlHandle::setOpt() with invalid string strict
--EXTENSIONS--
curl
--FILE--
<?php

declare(strict_types=1);

try {
	(new CurlHandle())->setOpt(CURLOPT_NOPROXY, 20);
} catch (TypeError $e) {
	var_dump($e->getMessage());
}

?>
==DONE==
--EXPECT--
string(102) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_NOPROXY must be of type string, int given"
==DONE==
