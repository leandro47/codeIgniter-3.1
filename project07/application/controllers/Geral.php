<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller {

	public function index()
	{
	
		$this->load->view('includes/header.php');
		$this->load->view('includes/footer.php');
	}
}
