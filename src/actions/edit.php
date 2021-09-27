<?php
require_once '../include/connect.php';
require_once '../include/functions.php';

$post = getPost();
$info = getInfo();
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
        <form action="../submitedit.php" method="post" name="submit-post" enctype="multipart/form-data">
            <?php foreach($info as $row): ?>
                <input type="hidden" name="post_id" value="<?= $row?->post_id ?>" />
                <a href="../index.php">
                <img class="mb-4" src="../img/oceanic-logo.png" alt="" max-width="100" height="80">
            </a>
            <legend class="h3 mb-3 fw-normal">Edit Post</legend>
            <label for="floatingInput">Post Title</label>
            <div class="form-floating">
                <input type="username" class="form-control" name="post_title" id="floatingInput" value="<?=$row?->post_title?>" placeholder="Title...">
            </div>
            </br>
                <img src="../get-img.php?id=<?=$row->post_id?>" width=300>
            </br>
            <div class="form-group">
                <label for="">Post Content</label>
                <textarea class="form-control" id="floatingInput" rows="8" name="post_body" value="<?=$row?->post_body?>"  placeholder="Content..."><?=$row?->post_body?></textarea>
            </div>
            <input type="file" name="upload" accept=".png,.jpg">
            </br></br>
            <button class="w-100 btn btn-lg btn-primary submit" type="submit" name="edit" id="btn-login" value="edit">Edit</button> 
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