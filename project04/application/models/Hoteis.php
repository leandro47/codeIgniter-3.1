<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hoteis extends CI_Model
{

    private $dados_hoteis;

    // construtor
    function __construct()
    {

        parent::__construct();
        //dados do hotel
        $this->dados_hoteis = [
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
    }

    public function imagensHoteis(){
        $imagens = [];
        foreach($this->dados_hoteis as $hotel){
            array_push($imagens, $hotel['imagens']);
        }
        return $imagens;
    }

    public function hotel($id){
        return $this->dados_hoteis[$id];
    }
}
