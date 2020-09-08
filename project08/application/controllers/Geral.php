<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller {

	public function index()
	{
		// $this->load->view('includes/inicio');
		// $this->load->view('includes/final');
		$this->load->helper('matematica');
		echo '<p>'.subtracao(5,8).'</p>';
	}
}
