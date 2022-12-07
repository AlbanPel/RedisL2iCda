
<?php

//get vue via API
//get vue via REDIS
$books = newBooks();
foreach ($books as $book) :
    $isbn13 = $book->isbn13;
    $bookRedis = getRedisBookByIsbn($isbn13);
    ?>
    <div class="col">
        <div class="card shadow-sm">
            <img src="<?= $bookRedis->image ?>" alt="<?= $bookRedis->image ?>">
            <div class="card-body">
                <p class="card-title"><h4><?= $bookRedis->title ?></h4></p>
                <p class="card-text">
                    <?= $bookRedis->subtitle ?>
                    </br>Prix:
                    <?= $bookRedis->price ?>
                    </br>ISBN :
                    <?= $bookRedis->isbn13 ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="book/details.php?isbn=<?= $bookRedis->isbn13 ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>