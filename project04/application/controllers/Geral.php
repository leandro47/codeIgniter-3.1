<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		//imagens dos hoteis
		$this->load->model('hoteis');
		$dados['images'] = $this->hoteis->imagensHoteis();

		$this->load->view('include/cabecalho');
		$this->load->view('pagina_inicial', $dados);
		$this->load->view('include/rodape');
	}

	public function hotel($id)
	{
		$this->load->model('hoteis');

		$dados['hotel'] = $this->hotel($id);

		$this->load->view('include/cabecalho');
		$this->load->view('pagina_hotel', $dados);
		$this->load->view('include/rodape');
	}
}
