<?php
	if(isset($_POST['submit2'])) {
		$email = 'D&B Sales Representative Name: ' .$_POST['referral-sales-rep'] ."\n"
			  .'Branch/Location: ' .$_POST['referral-location'] ."\n"
			  .'First Name: ' .$_POST['referral-first-name'] ."\n"
			  .'Last Name: ' .$_POST['referral-last-name'] ."\n"
			  .'Phone: ' .$_POST['referral-phone'] ."\n"
			  .'Email: ' .$_POST['referral-email'] ."\n"
			  .'Message: ' .$_POST['referral-form-message'];
		mail('aborden@fsdae.com', 'D&B Referral', $email);
		header("location: success.php");
	} else {
		header("location: index.php");
		exit(0);
	}
?>