--TEST--
CurlHandle::setOpt() with invalid string non strict
--EXTENSIONS--
curl
--FILE--
<?php

try {
	(new CurlHandle())->setOpt(CURLOPT_NOPROXY, 20);
} catch (TypeError $e) {
	var_dump($e->getMessage());
}

?>
==DONE==
--EXPECT--
==DONE==
