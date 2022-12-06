<?php

$url = 'https://api.itbook.store/1.0/new';
$json = file_get_contents($url);
$jo = json_decode($json);
var_dump($jo);


