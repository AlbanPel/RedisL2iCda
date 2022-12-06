<?php

function newBooks()
{
    $url = 'https://api.itbook.store/1.0/new';

    $result = json_decode(file_get_contents($url));

    return $result->books;
}


function getBookByISBN($isbn)
{
    $url = 'https://api.itbook.store/1.0/books/' . $isbn;

    $result = json_decode(file_get_contents($url));

    return $result;
}





