<?php

require_once '../vendor/autoload.php';

$api = (new \CryptoPete\Frost\FrostFactory())->api();

$work = $api->getWorkById('46b6144b7fc6825caa3cf4b83149226f8d3f7bc0b20e6780c5d80423d1a5b86a');

print_r($work);

print_r($api->getWorks());
