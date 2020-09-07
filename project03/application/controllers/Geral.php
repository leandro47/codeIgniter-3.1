<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		//imagens dos hoteis
		$hoteis = [
			'hotel_1.jpg',
			'hotel_2.jpg',
			'hotel_3.jpg',
			'hotel_4.jpg',
		];
		$dados['images'] = $hoteis;
		$this->load->view('include/cabecalho');
		$this->load->view('pagina_inicial', $dados);
		$this->load->view('include/rodape');
	}

	public function hotel($id)
	{
		//dados do hotel
		$hoteis = [
			// hotel 1
			[
				'nome_hotel'    => 'Hotel Maravilhoso 5*',
				'descricao'     => 'Situado junto à praia com 500 quartos e serviço TI.',
				'imagem'        => 'hotel_1.jpg'
			],
			// hotel 2
			[
				'nome_hotel'    => 'Hotel Esplendor 4*',
				'descricao'     => 'Aqui come e bebe sem parar.',
				'imagem'        => 'hotel_2.jpg'
			],
			// hotel 3
			[
				'nome_hotel'    => 'Hotel Grandioso 5*',
				'descricao'     => 'Receção aberta 24 horas por dia... e mais 3 horas à noite!',
				'imagem'        => 'hotel_3.jpg'
			],
			// hotel 4
			[
				'nome_hotel'    => 'Hotel Espetáculo 5*',
				'descricao'     => 'O melhor hotel do Mundo, ou talvez não.',
				'imagem'        => 'hotel_4.jpg'
			],
		];

		$dados['hotel'] = $hoteis[$id];
		$this->load->view('include/cabecalho');
		$this->load->view('pagina_hotel', $dados);
		$this->load->view('include/rodape');
	}
}
