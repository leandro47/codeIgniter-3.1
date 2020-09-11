<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{

	public function index()
	{
		// ==================================================
		// ENVIO DE EMAIL COM PHPMAILER
		// ==================================================
		$this->load->library('Emails');

		//prepara os dados
		$nome = 'leandro teste';
		$email = 'contato@mallon.com.br';
		$localizacao = 'Mafra';
		$telefone = '47988387536';
		$texto_mensagem = 'Olá eu sou um teste de e-mail';

		$assunto = 'Texto do assunto';
		$mensagem = "Mensagem enviada do site xpto<hr>" .
			"Nome: <b>$nome</b><br>" .
			"Email: <b>$email</b><br>" .
			"Localização: <b>$localizacao</b><br>" .
			"Telefone: <b>$telefone</b><br>" .
			"Mensagem: <b>$texto_mensagem</b><br>";

		if ($this->emails->enviar($assunto, $mensagem)) {
			//mensagem enviada com sucesso
			//apresentar view sobre o sucesso
			echo 'enviado com sucesso';
		} else {
			//erro no envio da mensagem
			//apresentar view sobre o erro
			echo 'Erro ao enviar email';
		}

		// ==================================================
		// ENCRIPTAÇÃO DE DADOS
		// ==================================================
		// $this->load->library('encryption');
		// // echo bin2hex($this->encryption->create_key(254)); //Criar chave

		// $nome = 'João';
		// $nome_enc =  $this->encryption->encrypt($nome);
		// $nome_desc = $this->encryption->decrypt($nome_enc);
		// echo  $nome. ' <br> ' . $nome_enc. '<br>'. $nome_desc;


		// ==================================================
		// VALIDAÇÃO DE FORMULARIO
		// ==================================================

		// $this->load->helper('form');
		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('text_usuario', 'Leandro', 'required', array('required' => 'o campo %s é obrigatorio'));


		// if ($this->form_validation->run() === false) {
		// 	$this->load->view('formulario');
		// } else {
		// 	$this->load->view('sucesso');
		// }

		// ==================================================
		// DOWNLOAD DE ARQUIVOS
		// ==================================================

		// $ficheiro = 'notas.txt';
		// $texto = 'este é um texto que vai ser quardado';

		// $this->zip->add_data($ficheiro, $texto);
		// $this->zip->archive('backup.zip');
		// $this->zip->download('backup.zip');
	}
}
