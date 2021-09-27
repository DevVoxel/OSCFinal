<?php
require_once 'include/connect.php';
require 'get/forgotpass.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">

</head>
<body class="text-center">
    <main class="form-signin">
        <form action="" method="post" name="forgot-form">
            <a href="index.php">
                <img class="mb-4" src="img/oceanic-logo.png" alt="" max-width="100" height="100">
            </a>
            <h1 class="h3 mb-3 fw-normal">Please enter your recovery pin</h1>
            <label for="floatingInput">Recovery Pin</label>
            <div class="form-floating">
                <input type="number" class="form-control" name="pin" id="floatingInput" value="" placeholder="Recovery Pin" min="0" max="99999999">
            </div>
</br>
            <button class="w-100 btn btn-lg btn-primary submit" type="submit" name="forgotpass" id="btn-register" value="Check">Submit</button> 
</br></br>
        </form>
            <?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<?php
				if(isset($viewpass)){
					echo '<div style="color:#198E35;text-align:center;margin-top:5px">'.$viewpass.'</div>';
				}
			?>
            <a href="index.php" style="font-size: 1.4rem;">Back</a>
        <?php require_once 'include/footer.php' ?>
    </main>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
