<div class="row">
	<div class="columns">
		<form action="index.php?page=register" method="post" novalidate>
			
			<h2>Registration Form</h2>

			<div>
				<label for="username">Username: </label>
				<input type="text" name="username" id="username" placeholder="iambatman" textarea class="error" value="<?php echo $this->username; ?>">

				<?php


					function errorMessage($message) {

						if( $message != '' ) {

						echo '<small class="error">';
						echo $message;
						echo '</small>';

						}

					}


					// If there is an error for the username
					// if( $this->userNameError != '' ) {

					// 	echo '<small class="error">';
					// 	echo $this->userNameError;
					// 	echo '</small>';

					// }

					errorMessage($this->userNameError);

				?>
			</div>

			<div>
				<label for="email">Email: </label>
				<input type="email" name="email" id="email" placeholder="example@example.com" textarea class="error" value=" <?php echo $this->email; ?> " >

				<?php errorMessage($this->emailError); ?>

			</div>

			<div>
				<label for="password">Password: </label>
				<input type="password" name="password" id="password">
			</div>

			<div>
				<label for="confirm-password">Confirm Password: </label>
				<input type="password" name="confirm-password" id="confirm-password" textarea class="error">

				<?php errorMessage($this->passwordError); ?>

			</div>
				
				<input type="submit" value="Register Account" class="tiny button radius" name="register-account">

		</form>
	</div>
</div>