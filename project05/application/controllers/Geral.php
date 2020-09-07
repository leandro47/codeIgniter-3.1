<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		$this->load->view('formulario');
	}

	public function tratarFormulario()
	{
		$formulario = [
			'nome' => $this->input->post('text_nome'),
			'telefone' => $this->input->post('text_telefone')
		];

		$dados['formulario'] =	$formulario;
		$this->load->view('apresentar_dados', $dados);
	}
}
