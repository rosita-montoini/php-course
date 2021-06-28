<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>PHP web</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <main>
        <div class="container mt-5">
            <h3 class="mb-5">Our Articles</h3>
            <div class="d-flex flex-wrap">
                <?php
                    for($i = 0; $i < 5; $i++):
                ?>
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Travels</h4>
                    </div>
                    <img src="img/<?php echo ($i + 1) ?>.jpg" alt="photo" class="img-thumbnail">
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">More details</button>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </main>
    <?php require "blocks/footer.php" ?>
</body>
</html>