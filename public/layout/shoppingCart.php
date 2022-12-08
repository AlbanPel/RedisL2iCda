<?php
include_once '../data/connect.php';
$redis = new \Redis();
$redis->connect('redis', 6379);

$bookSelected = htmlspecialchars($_GET['addToCart']);
$book = getRedisBookByIsbn($bookSelected);

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
        <h1 class="d-flex justify-content-center pt-2">My shopping cart</h1>
        <section class="h-100 h-custom">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="h5">Shopping Bag</th>
                                        <th scope="col">ISBN13</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= $book->image ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2"><?= $book->title ?></p>
                                                    <p class="mb-0"><?= $book->authors ?></p>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"><?= $book->isbn13 ?></p>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex flex-row">
                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" style="width: 50px;" />

                                                <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0 fw-bold text-secondary"><?= $book->price ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                        <form>
                                            <div class="d-flex flex-row pb-3">
                                                <div class="d-flex align-items-center pe-2">
                                                    <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v" value="" aria-label="..." checked />
                                                </div>
                                                <div class="rounded border w-100 p-3">
                                                    <p class="d-flex align-items-center mb-0">
                                                        <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                                                        Card
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row pb-3">
                                                <div class="d-flex align-items-center pe-2">
                                                    <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v" value="" aria-label="..." />
                                                </div>
                                                <div class="rounded border w-100 p-3">
                                                    <p class="d-flex align-items-center mb-0">
                                                        <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row">
                                                <div class="d-flex align-items-center pe-2">
                                                    <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v" value="" aria-label="..." />
                                                </div>
                                                <div class="rounded border w-100 p-3">
                                                    <p class="d-flex align-items-center mb-0">
                                                        <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-6">
                                        <div class="row">
                                            <div class="col-12 col-xl-6">
                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="John Smith" />
                                                    <label class="form-label" for="typeName">Name on card</label>
                                                </div>

                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                                                    <label class="form-label" for="typeExp">Expiration</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-6">
                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                                                    <label class="form-label" for="typeText">Card Number</label>
                                                </div>

                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                    <label class="form-label" for="typeText">Cvv</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-3">
                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">$23.49</p>
                                        </div>

                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-0">Shipping</p>
                                            <p class="mb-0">$2.99</p>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                            <p class="mb-2">Total (tax included)</p>
                                            <p class="mb-2">$26.48</p>
                                        </div>

                                        <button type="button" class="btn btn-primary btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>Checkout</span>
                                                <span>$26.48</span>
                                            </div>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>