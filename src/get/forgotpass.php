<?php
    require_once 'include/connect.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';
		$pin = $_POST['pin'];

		if(empty($pin))
			$errMsg = 'Enter Recovery Pin to view password.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT user_pass, pin FROM USER WHERE pin = :pin');
				$stmt->execute(array(
					':pin' => $pin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($pin == $data['pin']) {
					$viewpass = 'Your password is: ' . '<strong>'. $data['user_pass'] . '</strong>' . '</br><a href="index.php">Login Here</a>';
				}
				else {
					$errMsg = 'Invalid Recovery Pin.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>