<?php
$redis = new \Redis();
$redis->connect('redis',6379);
$books = newBooks();
foreach ($books as $book) {
    $isbn13 = $book->isbn13;
    //echo $isbn13;
    $url = 'https://api.itbook.store/1.0/books/'.$isbn13;
    $details = json_decode(file_get_contents($url));
    $redis->hset('keyBook:'.$isbn13, 'title', $details->title);
    $redis->hset('keyBook:'.$isbn13, 'subtitle', $details->subtitle);
    $redis->hset('keyBook:'.$isbn13, 'price', $details->price);
    $redis->hset('keyBook:'.$isbn13, 'image', $details->image);
    $redis->hset('keyBook:'.$isbn13, 'isbn13', $isbn13);
    $redis->hset('keyBook:'.$isbn13, 'description', $details->description);
    $redis->hset('keyBook:'.$isbn13, 'authors', $details->authors);
    $redis->hset('keyBook:'.$isbn13, 'publisher', $details->publisher);
    $redis->hset('keyBook:'.$isbn13, 'pages', $details->pages);
    $redis->hset('keyBook:'.$isbn13, 'year', $details->year);
    $redis->hset('keyBook:'.$isbn13, 'rating', $details->rating);
    $redis->hset('keyBook:'.$isbn13, 'reviews', $details->reviews);
    $redis->hset('keyBook:'.$isbn13, 'language', $details->language);
    $redis->hset('keyBook:'.$isbn13, 'url', $details->url);
    $redis->hset('keyBook:'.$isbn13, 'pdf', $details->pdf);
    $redis->hset('keyBook:'.$isbn13, 'epub', $details->epub);
    $redis->hset('keyBook:'.$isbn13, 'mobi', $details->mobi);
}
