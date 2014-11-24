<?php

class Index extends Controller {

	public function __construct() {

		parent::__construct();

	}

	public function index() {

		$this -> _view -> setData('title', 'It works... | Aji\'s PHP Framework');

		$this -> _view -> render('index');

	}

}
