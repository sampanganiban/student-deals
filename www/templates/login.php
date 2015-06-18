<div class="row">
	<div class="columns">
		<form method="post">
			
			<h1>Login into your Account</h1>
			
			<div class="row">
				<div class="medium-6 columns">
					<label for="username">Username: </label>
					<input type="text" name="username" id="username" textarea class="error" value="<?php echo $this->username; ?>">
					<?php

						function errorMessage($message) {
							if( $message != '' ) {
								echo '<small class="error">';
								echo $message;
								echo '</small>';
							}
						}
					
					errorMessage($this->usernameError); 

					?>
				</div>

				<div class="medium-6 columns">
					<label for="password">Password: </label>
					<input type="password" name="password" id="password" textarea class="error">
					<?php errorMessage($this->passwordError); ?>
				</div>

				<!-- <div>
					<a href="index.php?page=resetPassword">Forgot your password?</a>
				</div> -->

				<div>
					<input type="submit" value="LOGIN" class="tiny button radius" name="login">
					<?php errorMessage($this->loginError);?>
				</div>
			</div>

		</form>
	</div>
</div>