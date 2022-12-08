<?php
include_once '../data/connect.php';
$redis = new \Redis();
$redis->connect('redis',6379);
//path -> params isbn
$isbn13 = htmlspecialchars($_GET["isbn"]);

//function getRedisBookByIsbn in connect.php
$book = getRedisBookByIsbn($isbn13);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Redis L2i</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
       <?php include_once('../layout/menu.php') ?>
    </header>
</div>
<main class="justify-center">
    <h1 class="d-flex justify-content-center pt-2">Book details <span class="fw-bold">(<?=  $book->title ?>)</span></h1>
    <div class="container">
        <div class="card mb-1">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?=  $book->image ?>" class="img-fluid rounded-start" alt="<?=  $book->image ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title text-info fw-bold"><?=  $book->title ?></h3>
                        <h5 class="card-text">Subtitle: <?=  $book->subtitle ?></h5>
                        <p class="card-text">Description : <?=  $book->description ?></p>
                        <p class="card-text">Authors : <?=  $book->authors ?></p>
                        <p class="card-text">Publisher : <?=  $book->publisher ?></p>
                        <p class="card-text">Year : <span class="fw-bold"><?=  $book->year ?></span></p>
                        <p class="card-text">Pages count : <?=  $book->pages ?></p>
                        <p class="card-text">Language : <?=  $book->language ?></p>
                        <p class="card-text">ISBN13 : <?=  $book->isbn13 ?></p>
                        <p class="card-text">ISBN10 :<?=  $book->isbn10 ?></p>
                        <p class="card-text">Price : <span class="fw-bold text-danger"><?=  $book->price ?></span></p>
                        <a href="<?=  $book->download ?>" class="btn btn-sm btn-outline-info mb-3">Download</a>
                        <a href="<?=  $book->pdf ?>" class="btn btn-sm btn-outline-secondary mb-3">Download PDF</a>
                        <a href="<?=  $book->epub ?>" class="btn btn-sm btn-outline-primary mb-3">Download EPUB</a>
                        <a href="shoppingCart.php?addItem=<?=$book->isbn13 ?>" class="btn btn-sm btn-success mb-3">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

