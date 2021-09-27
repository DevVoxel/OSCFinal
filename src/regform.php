<?php
require_once 'include/connect.php';
require 'get/register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">

</head>
<body class="text-center">
    <main class="form-signin">
            <?php
				if(isset($errMsg)){
					echo '<div style="color:#770000;font-size:18px;"><strong>'.$errMsg.'</strong></div>';
				}
			?>
        <form action="" method="post" name="register-form">
            <a href="index.php">
                <img class="mb-4" src="img/oceanic-logo.png" alt="" max-width="100" height="100">
            </a>
            <h1 class="h3 mb-3 fw-normal">Register Here</h1>
            <label for="floatingInput">Username</label>
            <div class="form-floating">
                <input type="username" class="form-control" name="username" id="floatingInput" value="" placeholder="Username">
            </div>
            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" id="floatingPassword" name="user_pass" value="" placeholder="Password">
            </div>   
            <div class="form-floating">
                <label for="floatingInput">First Name</label>
                <input type="text" class="form-control" id="floatingInput" name="firstname" value="" placeholder="First Name">
            </div> 
            <div class="form-floating">
                <label for="floatingInput">Last name</label>
                <input type="text" class="form-control" id="floatingInput" name="lastname" value="" placeholder="Last Name">
            </div> 
            <div class="form-floating">
                <label for="floatingInput">Middle Initial</label>
                <input type="text" class="form-control" id="floatingInput" name="mi" value="" placeholder="MI" maxlength="1">
            </div> 
            <div class="form-floating">
                <label for="floatingInput">Recovery Pin</label>
                <input type="number" class="form-control" id="floatingInput" name="pin" value="" placeholder="Recovery Pin" min="0" max="99999999">
            </div> 
</br></br>
            <button class="w-100 btn btn-lg btn-primary submit" type="submit" name="register" id="btn-register" value="">Register</button>
        </form>
            </br>
        <a href="index.php" style="font-size: 1.4rem;">Back</a>
        <?php require_once 'include/footer.php' ?>
    </main>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
