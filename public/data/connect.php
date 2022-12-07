<?php

function newBooks()
{
    $url = 'https://api.itbook.store/1.0/new';

    $result = json_decode(file_get_contents($url));

    return $result->books;
}

function getRedisBookByIsbn($isbn13)
{
    //REDIS
    $redis = new \Redis();
    $redis->connect('redis',6379);

    //COMMAND REDIS

    return (object) $redis->hGetAll('keyBook:' . $isbn13);
}

function connectToRedisDB()
{
    $redis = new \Redis();
    $redis->connect('redis',6379);
    return $redis;
}





