<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	// ==================================================
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/cabecalho');

		$this->load->view('usuarios/login');

		$this->load->view('includes/rodape');
		$this->load->view('includes/footer');
	}

	public function setup()
	{
		$this->load->view('includes/header');

		// Load setup
		$this->load->view('setup/setup');

		$this->load->view('includes/footer');
	}

	public function resetdb()
	{
		// Limpa todos os dados do banco de dados
		$this->load->model('basedados');
		$this->basedados->reset();

		//Apresenta a view
		$this->load->view('includes/header');
		$this->load->view('setup/setup');
		$dados = [
			'mensagem' => 'Sistema de base de dados reiniciado com sucesso',
			'tipo' => 'success'
		];
		$this->load->view('includes/mensagem', $dados);
		$this->load->view('includes/footer');
	}

	public function inserirusuarios()
	{
		//insere 3 usuarios
		$this->load->model('basedados');
		$this->basedados->inserir_usuarios();

		//Apresenta a view
		$this->load->view('includes/header');
		$this->load->view('setup/setup');
		$dados = [
			'mensagem' => 'Usuario inserido com sucesso.',
			'tipo' => 'success'
		];
		$this->load->view('includes/mensagem', $dados);
		$this->load->view('includes/footer');
	}
	// ==================================================
	public function inserirprodutos()
	{
		//insere produtos na base de dados
		$this->load->model('basedados');
		$this->basedados->inserir_produtos();

		$this->load->view('includes/header');
		$this->load->view('setup/setup');
		$dados = [
			'mensagem'  => 'Inseridos produtos com sucesso.',
			'tipo'      => 'success',
		];
		$this->load->view('includes/mensagem', $dados);
		$this->load->view('includes/footer');
	}
}
