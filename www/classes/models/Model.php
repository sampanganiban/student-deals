<?php

class Model {
// This is typically the order when you write a class

	// Properties
	// private to the model but also accessible to the models children 
	protected $dbc;
	public $title;
	public $description;

	// Contructor
	public function __construct() {

		// Connect to the database and save the connection the property above
		$this->dbc = new mysqli('localhost','root','','cheapo');

	}

	// Methods (functions)
	public function getPageInfo() {

		$requestedPage = $_GET['page'];
		// Write the query to display the title and description to pages that are requested, this information is taken from the database 'cheapo'
		// Because it's a SELECT query it will return us with a result
		$sql = "SELECT Title, Description FROM pages WHERE Name = '$requestedPage' "; 

		// Run this query
		// $result is an object
		$result = $this->dbc->query( $sql );

		// Make sure there is data in the result
		// If not then we need to get the 404 data instead
		if( $result->num_rows == 0 ) {


			// Prepare SQL to get the 404 page data
			$sql = "SELECT Title, Description FROM pages WHERE Name = '404' ";

			// Run the query
			$result = $this->dbc->query( $sql );

		}

		// Convert the result into an associative array
		$pageData = $result->fetch_assoc();

		// Save title and description in the properties above, this is taken from the database so it must be written how it is written in the database
		$this->title 	   = $pageData['Title'];
		$this->description = $pageData['Description'];

	}


}