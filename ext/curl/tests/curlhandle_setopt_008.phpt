--TEST--
CurlHandle::setOpt() with invalid nullable string strict
--EXTENSIONS--
curl
--FILE--
<?php

declare(strict_types=1);

try {
	(new CurlHandle())->setOpt(CURLOPT_CUSTOMREQUEST, 0);
} catch (TypeError $e) {
	var_dump($e->getMessage());
}
try {
	(new CurlHandle())->setOpt(CURLOPT_CUSTOMREQUEST, 20);
} catch (TypeError $e) {
	var_dump($e->getMessage());
}

?>
==DONE==
--EXPECT--
string(109) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_CUSTOMREQUEST must be of type ?string, int given"
string(109) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_CUSTOMREQUEST must be of type ?string, int given"
==DONE==
