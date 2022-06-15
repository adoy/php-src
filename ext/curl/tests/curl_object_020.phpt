--TEST--
Test curl_getinfo() function with CURLINFO_HTTP_CODE parameter
--CREDITS--
Jean-Marc Fontaine <jmf@durcommefaire.net>
--EXTENSIONS--
curl
--FILE--
<?php
  include 'server.inc';
  $host = curl_cli_server_start();

  $url = "{$host}/get.inc?test=";
  $ch  = new CurlHandle($url);
  $ch->setOpt(CURLOPT_URL, $url);
  $ch->exec();
  var_dump($ch->getInfo(CURLINFO_HTTP_CODE));
?>
--EXPECT--
Hello World!
Hello World!int(200)
