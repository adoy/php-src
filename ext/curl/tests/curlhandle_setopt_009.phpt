--TEST--
CurlHandle::setOpt() with invalid URL non strict
--EXTENSIONS--
curl
--FILE--
<?php

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
string(2) "10"
==DONE==
