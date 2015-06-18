<?php

class AccountPage extends Page {

	public function contentHTML() {

		// Make sure that the user is logged in
		// If not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {

			echo 'You need to be logged in';
			return;

		}

		include 'templates/account.php';

		// If user is an admin
		if( $_SESSION['privilege'] == 'admin' ) {

			include 'templates/admincontrols.php';

		}
	
	}

}