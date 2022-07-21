--TEST--
Test CurlHandle::reset()
--EXTENSIONS--
curl
--FILE--
<?php

$test_file = tempnam(sys_get_temp_dir(), 'php-curl-test');
$log_file = tempnam(sys_get_temp_dir(), 'php-curl-test');

$fp = fopen($log_file, 'w+');
fwrite($fp, "test");
fclose($fp);

$testfile_fp = fopen($test_file, 'w+');

$ch = new CurlHandle();
$ch->setOpt(CURLOPT_FILE, $testfile_fp);
$ch->setOpt(CURLOPT_URL, 'file://' . $log_file);
$ch->exec();

$ch->reset();
$ch->setOpt(CURLOPT_URL, 'file://' . $log_file);
$ch->exec();

unset($ch);

fclose($testfile_fp);

echo file_get_contents($test_file);

// cleanup
unlink($test_file);
unlink($log_file);
?>
--EXPECT--
testtest
