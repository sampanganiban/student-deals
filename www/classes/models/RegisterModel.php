
<?php

class RegisterModel extends Model {

	public function checkUsernameExists( $username ) {

		// Filter the username just in case it has malicious code
		// real escape string will send it to the database, but instead filter it so it will not break the SQL query
		$username = $this->dbc->real_escape_string( $username );

		// Prepare SQL (query) to check if the username exists in the database
		$sql = "SELECT Username FROM users WHERE Username = '$username'";

		// Run the query, method of query
		$result = $this->dbc->query( $sql );

		// If there is no result
		if( $result->num_rows > 0 ) {

			// Account does exist
			return true;

		} else {

			// Account does NOT exist
			return false;

		}

	}

	public function checkEmailExists( $email ) {

		// Filter the email so that the SQL is safe
		$email = $this->dbc->real_escape_string( $email );

		// Prepare the SQL
		$sql = "SELECT Email FROM users WHERE Email = '$email'";

		$result = $this->dbc->query( $sql );

		// If there is a result from the database
		return $result->num_rows ? true: false;

		// // If there is no result
		// if( $result->num_rows > 0 ) {

		// 	// Email address does exist
		// 	return true;

		// } else {

		// 	// Email address does NOT exist
		// 	return false;

		// }

		// THESE TWO MEAN THE SAME THING

	}

	public function registerNewAccount($username, $email, $password) {

		// Filter the data first
		$username = $this->dbc->real_escape_string( $username );
		$email = $this->dbc->real_escape_string( $email );

		// Hash password
		require 'vendor/password.php';

		$hashedPassword = password_hash( $password, PASSWORD_BCRYPT );

		// Prepare SQL, this will insert data into a database, null is the first value because the first column is the ID which is automatically incremented 
		$sql = "INSERT INTO users VALUES ( NULL, '$username','$hashedPassword', '$email', 'user', CURRENT_TIMESTAMP )";

		// Run the SQL, this will add the data into the database
		$this->dbc->query($sql);

		// Log the user in by saving their details into the session, to save details into the session
		$_SESSION['username'] = $username;
		$_SESSION['privilege'] = 'user';

	}










}
