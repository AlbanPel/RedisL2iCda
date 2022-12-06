<?php
$url = 'https://api.itbook.store/1.0/new';
$bookList = json_decode(file_get_contents($url))->books;


