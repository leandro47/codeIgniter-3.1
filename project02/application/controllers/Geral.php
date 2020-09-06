<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		$dados['nomes'] = ['Leandro', 'Joao', 'Lucas'];
		$dados['idade'] = 22;

		$this->load->view('include/cabecalho');
		$this->load->view('conteudo', $dados);
		$this->load->view('include/rodape');
	}
	public function p2($nome)
	{
		echo $nome;
		$this->load->view('include/cabecalho');
		$this->load->view('include/rodape');
	}
	public function p3($nome, $idade = 30)
	{
		echo $nome .'-'. $idade;
		$this->load->view('include/cabecalho');
		$this->load->view('include/rodape');
	}
}
