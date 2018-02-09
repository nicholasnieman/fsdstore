<?php
	if(isset($_POST['submit'])) {
		$email = 'First Name: ' .$_POST['request-first-name'] ."\n"
			  .'Last Name: ' .$_POST['request-last-name'] ."\n"
			  .'Store Location: ' .$_POST['request-location'] ."\n"
			  .'Message: ' .$_POST['request-form-message'];
		mail('jay@fsdae.com', 'D&B Request', $email);
		header("location: success.php");
	} else {
		header("location: index.php");
		exit(0);
	}
?>