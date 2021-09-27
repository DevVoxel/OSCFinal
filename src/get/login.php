<?php
require_once 'include/connect.php';

    if(isset($_POST['login'])) {
		$errMsg = '';
		$username = $_POST['username'];
		$user_pass = $_POST['user_pass'];

		if($username == '')
			$errMsg = 'Enter username';
		if($user_pass == '')
			$errMsg = 'Enter password';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT user_id, username, user_pass, firstname, lastname, pin FROM USER WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "User $username not found.";
				}
				else {
					if($user_pass == $data['user_pass']) {
						$_SESSION['firstname'] = $data['firstname'];
						$_SESSION['lastname'] = $data['lastname'];
						$_SESSION['mi'] = $data['mi'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['user_pass'] = $data['user_pass'];
						$_SESSION['pin'] = $data['[pin]'];

						header('Location: forum.php');
						exit;
					}
					else
						$errMsg = 'Password is incorrect.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>