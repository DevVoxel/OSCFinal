<?php
require_once '../include/connect.php';
require_once '../include/functions.php';

$post = getPost();
$info = getInfo();
$imginfo = getImgInfo();
$img = getImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="" method="" name="view-post">
            <?php foreach($info as $row): ?>
                <input type="hidden" name="post_id" value="<?= $row?->post_id ?>" />
                <a href="../forum.php">
                <img class="mb-4" src="../img/oceanic-logo.png" alt="" max-width="100" height="100">
            </a>
            <legend class="h5 mb-3 fw-normal">View Post <?=$row?->post_id?></legend>
            <div class="form-floating">
                <h2><?=$row?->post_title?></h2>
            </div>
            </br>
                <?php foreach($imginfo as $ig): ?>
                    <img src="../get-img.php?id=<?=$ig->image_id?>" width=300>
                <?php endforeach; ?>
            </br>
            <div class="form-group">
                <p><?=$row?->post_body?></p>
            </div>
            </br>
        </form>
        </br>
        <a href="../forum.php" style="font-size: 1.4rem;">Back</a>
        <?php require_once '../include/footer.php' ?>
    </main>
<?php endforeach; ?>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>