<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		// $this->load->view('includes/inicio');
		// $this->load->view('includes/final');
		$this->load->library('session');

		$this->session->set_userdata('usuario', 'LEANDRO SILVA');

		// $this->session->sess_destroy();
		$this->session->unset_userdata('usuario');
		echo $this->session->usuario;

	}
}
