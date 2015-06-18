<?php

class Page {

	// Properties
	public $model;

	// Constructor
	public function __construct($model) {
	
		$this->model = $model;

		// Get page data
		$this->model->getPageInfo();

	}

	// Function to build the HTML
	public function buildHTML() {

		// Header
		include 'templates/header.php';

		// Content
		$this->contentHTML();

		// Footer
		include 'templates/footer.php';

	}

}