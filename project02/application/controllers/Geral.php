<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		$this->load->view('include/cabecalho');
		$this->load->view('pagina1');
		$this->load->view('include/rodape');
	}
	public function p2()
	{
		$this->load->view('include/cabecalho');
		$this->load->view('pagina2');
		$this->load->view('include/rodape');
	}
	public function p3()
	{
		$this->load->view('include/cabecalho');
		$this->load->view('pagina3');
		$this->load->view('include/rodape');
	}
}
