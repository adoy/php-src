--TEST--
CurlHandle::setOpt() with invalid URL strict
--EXTENSIONS--
curl
--FILE--
<?php

declare(strict_types=1);

try {
	$ch = new CurlHandle();
	$ch->setOpt(CURLOPT_URL, 10);
	var_dump($ch->getInfo(CURLINFO_EFFECTIVE_URL));
} catch (TypeError $e) {
	var_dump($e->getMessage());
}
?>
==DONE==
--EXPECT--
string(98) "Argument 2 passed to CurlHandle::setOpt() for option CURLOPT_URL must be of type string, int given"
==DONE==
