<?php

class LogoutPage extends Page {

	// Properties

	public function __construct($model) {

		// Use the parent constructor code
		parent::__construct($model);

		// We need to check if the user has logged out
		//  session_destroy means that everything will be removed
		// unset will clear any information that the user has loaded
		if(	isset($_SESSION['username']) ) {

			unset($_SESSION['username']);
			unset($_SESSION['privilege']);

		}

	}
	
	public function contentHTML() {

		include 'templates/logout.php';

	}

}