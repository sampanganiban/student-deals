<div class="row">
	<div class="columns">
		<form method="post" action="index.php?page=account">
			<label>Users: </label>
			<select class="large-6 columns" name="username">
				<?php

					// Use the model to get all accounts
					$result = $this->model->getAllUsernames();

					// Loop through the result and display all the usernames
					while( $row = $result->fetch_assoc() ) {

						// Make sure the user is not an admin
						if(  $row['Privilege'] == 'admin' || $row['Active'] == 'disabled' ) {
							continue;
						}

						echo '<option>'.$row['Username'].'</option>';

					}

				?>
			</select>

			<input type="submit" value="Disable Account" name="delete" class="tiny button">
		</form>
	</div>
</div>