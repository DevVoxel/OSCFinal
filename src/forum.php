<?php
require_once 'include/connect.php';
require_once 'include/functions.php';
require_once 'get-img.php';

$post = getPost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Oceanic Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/nav.css" type="text/css">
</head>

<body class="">
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img src="img/oceanic-logo.png" height="50" width="80">
                    <strong>Oceanic Squad</strong>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Oceanic Forum</h1>
                    <p class="lead text-muted">Welcome to a free forum for Oceanic Members and Waveriders! You all can use this platform to post/edit/delete threads that you want to share!  Use this forum to share your thoughts on certain issues, or just what you are up to lately! Thank you for your support!</p>
                    <a href="actions/create.php" class="btn btn-primary my-2">Create Post</a>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="card-body">
                        <?php foreach($post as $row): ?>
                        <div class="card shadow-sm">
                            <?php if (isset($row->image_id)): ?>
                                <img src="get-img.php?id=<?=$row->image_id?>" alt="post"> 
                            <?php else: ?>
                                <img src="img/nothing.jpg" alt="There is nothing here.">
                            <?php endif; ?>
                            <div class="card-body">
                                <p class="card-text" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?=$row->post_title?></p>
                                <p class="card-text" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?=$row->post_body?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="actions/view.php?id=<?=$row->post_id?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                        <a href="actions/edit.php?id=<?=$row->post_id?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="actions/delete.php?id=<?=$row->post_id?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Del</button>
                                        </a>
                                    </div>
                                    <small class="text-muted">Created: <?=$row->date_created?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bd-placeholder-img card-img-top card-text">
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <center><?php require_once 'include/footer.php' ?></center>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
