<?php

class LoginPage extends Page {

	// Properties
	private $username;
	private $usernameError;
	private $passwordError;
	private $loginError;

	public function __construct( $model ) {

		parent::__construct($model);

		// If the user has submitted the Login form
		if( isset($_POST['username']) ) {

			// Process the login form
			$this->processLoginForm();

		}

	}

	public function processLoginForm() {

		// Save the username
		$this->username = trim($_POST['username']);

		// Validate the form before attempting to login
		if( trim($_POST['username']) == '' ) {
			$this->usernameError = 'You must enter your username';
		}

		if( $_POST['password'] == '' )  {
			$this->passwordError = 'You must enter your password';
		}

		// If there are no errors
		if( $this->usernameError == '' && $this->passwordError == '' ) {
			// Use the model to check if the user has the right credentials
			$this->model->attemptLogin();

			// If this code runs then the user was not redirected, therefore they did not have the correct login credentials
			$this->loginError = 'You must provide the correct Username and Password';

		}

	}

	public function contentHTML() {

		include 'templates/login.php';

	}

}

















