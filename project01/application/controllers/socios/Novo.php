<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Novo extends CI_Controller
{

	public function index()
	{
		$this->load->view('includes/cabecalho');
		$this->load->view('inicio/conteudo');
		$this->load->view('includes/rodape');
	}

	public function pagetwo()
	{
		$this->load->view('includes/cabecalho');
		$this->load->view('pagetwo/index');
		$this->load->view('includes/rodape');
	}
}
