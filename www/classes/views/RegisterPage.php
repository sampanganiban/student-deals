<?php

class RegisterPage extends Page {

	// Properties
	private $userNameError;
	private $username;
	private $email;
	private $emailError;
	private $passwordError;
	private $registrationSuccess = false;

	public function contentHTML() {

		include 'templates/registrationform.php';
		

	}

	public function __construct($model) {

		// Use the parent constructor code
		parent::__construct($model);

		// Process data 
		// If the registration form has been submitted
		if( isset( $_POST['register-account'] ) ) {

			// User has submitted the form
			$this->processNewAccount();

		}
	}

	public function processNewAccount() {

		// Make life easier
		$uName 	 = trim($_POST['username']);
		$email 	 = trim($_POST['email']);
		$pass 	 = ($_POST['password']);
		$conpass = ($_POST['confirm-password']);

		// Save form data if form is submitted with errors
		$this->username = $uName;
		$this->email = $email;

		// Validate the username
		if( strlen($uName) > 20 || strlen($uName) < 3 ) {

			$this->userNameError = 'Must be at least 3 and at most 20 characters';

		} elseif( !preg_match( '/^[a-zA-Z0-9_\-.]{3,20}$/', $uName ) ) {
			// this will validate the form inputs using a regular expression
			// preg_match will create a regular expression to check if the input matches it
			$this->userNameError = 'Only use letter, numbers, hyphens, underscores and full stops';

		} elseif( $this->model->checkUsernameExists( $uName ) ) {
			// The username already exists
			$this->userNameError = 'Username is already in use';
		}

		// Validate the email
		if( strlen($email) < 6 || strlen($email) > 254 ) {

			$this->emailError = 'Email is an invalid length';

		} elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

			$this->emailError = 'Invalid email example@example.com';

		} elseif( $this->model->checkEmailExists( $email ) ) {

			$this->emailError = 'This email is already in use';

		}

		// Validate the password
		if( strlen($pass) < 8 ) {

			$this->passwordError = 'Passwords must be at least 8 characters';

		} elseif( $pass != $conpass ) {

			$this->passwordError = 'Passwords do not match';

		}

		// If there are no errors then register the account
		if ( $this->userNameError == '' && $this->emailError == '' && $this->passwordError == '' ) {

			// If the form is valid
			$this->model->registerNewAccount($uName, $email, $pass);

			// Redirect the user
			header('Location: index.php?page=account');



		}	


	}

}




















