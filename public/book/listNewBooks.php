
<?php
$books = newBooks();
foreach ($books as $book) : ?>
    <div class="col">
        <div class="card shadow-sm">
            <img src="<?= $book->image ?>" alt="<?= $book->image ?>">
            <div class="card-body">
                <p class="card-title"><h4><?= $book->title ?></h4></p>
                <p class="card-text">
                    <?= $book->subtitle ?>
                    </br>Prix:
                    <?= $book->price ?>
                    </br>ISBN :
                    <?= $book->isbn13 ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="book/details.php?isbn=<?= $book->isbn13 ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>