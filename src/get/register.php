<?php
	require_once 'include/connect.php';

	if(isset($_POST['register'])) {
		$errMsg = '';
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$mi = $_POST['mi'];
		$username = $_POST['username'];
		$user_pass = $_POST['user_pass'];
		$pin = $_POST['pin'];

		if($firstname == '')
			$errMsg = 'Enter your first name';
		if($lastname == '')
			$errMsg = 'Enter your last name';
		if($mi == '')
			$errMsg = 'Enter your middle initial';
		if($username == '')
			$errMsg = 'Enter username';
		if($user_pass == '')
			$errMsg = 'Enter password';
		if($pin == '')
			$errMsg = 'Enter a recovery pin #';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO USER (username, user_pass, firstname, lastname, mi, pin) VALUES (:username, :user_pass, :firstname, :lastname, :mi, :pin)');
				$stmt->execute(array(
					':firstname' => $firstname,
					':lastname' => $lastname,
					':mi' => $mi,
					':username' => $username,
					':user_pass' => $user_pass,
					':pin' => $pin
					));
				header('Location: regform.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration complete. Login <a href="index.php">here</a>';
	}
?>