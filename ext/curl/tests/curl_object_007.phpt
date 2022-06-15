--TEST--
Test curl_error() & curl_errno() function without url
--EXTENSIONS--
curl
--FILE--
<?php

$ch = new CurlHandle();
var_dump($ch->getErrno());
$ch->exec();
var_dump($ch->getErrno());
unset($ch);


?>
--EXPECTF--
int(0)
int(3)
