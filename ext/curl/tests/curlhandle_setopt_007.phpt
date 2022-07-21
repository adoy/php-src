--TEST--
CurlHandle::setOpt() with invalid nullable string non strict
--EXTENSIONS--
curl
--FILE--
<?php

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
==DONE==
