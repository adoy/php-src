--TEST--
CurlHandle::setOpt() with invalid bool non strict
--EXTENSIONS--
curl
--FILE--
<?php

try {
	(new CurlHandle())->setOpt(CURLOPT_VERBOSE, 1);
} catch (CurlException $e) {
	var_dump($e->getCode(), $e->getMessage());
}

?>
==DONE==
--EXPECT--
==DONE==
