<?php
$books = newBooks();

foreach ($books as $book) {
    $isbn13 = $book->isbn13;
    $url = 'https://api.itbook.store/1.0/books/'.$isbn13;
    $details = json_decode(file_get_contents($url));
    $redis->hmset('keyBook:'.$isbn13, [
        'title' => $details->title,
        'subtitle' => $details->subtitle,
        'price' => $details->price,
        'image' => $details->image,
        'isbn13' => $isbn13,
        'description' => $details->description,
        'authors' => $details->authors,
        'publisher' => $details->publisher,
        'pages' => $details->pages,
        'year' => $details->year,
        'rating' => $details->rating,
        'reviews' => $details->reviews,
        'language' => $details->language,
        'url' => $details->url,
        'pdf' => $details->pdf,
        'epub' => $details->epub,
        'mobi' => $details->mobi,
    ]);

}
