<?php

require_once '../vendor/autoload.php';

$api = (new \CryptoPete\Frost\FrostFactory())->api();

$work = $api->createWork([
    'name' => 'I am a pickle',
    'datePublished' => '2018-02-15T20:12:01+00:00',
    'dateCreated' => '2018-02-14T19:50:21+00:00',
    'author' => 'Pickle Rick',
    'tags' => 'pickle rick morty unimpressed',
    'content' => 'Rick tells Morty to come to the garage, and Morty discovers that Rick has turned himself into a pickle but is unimpressed.'
]);

print_r($work);
