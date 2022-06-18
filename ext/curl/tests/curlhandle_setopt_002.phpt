--TEST--
CurlHandle::setOpt() with invalid bool strict
--EXTENSIONS--
curl
--FILE--
<?php

declare(strict_types=1);

try {
	(new CurlHandle())->setOpt(CURLOPT_VERBOSE, 1);
} catch (TypeError $e) {
	var_dump($e->getMessage());
}

?>
==DONE==
--EXPECT--
string(100) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_VERBOSE must be of type bool, int given"
==DONE==
