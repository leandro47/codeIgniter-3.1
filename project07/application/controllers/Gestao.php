<?php
defined('BASEPATH') or exit('URL inválida.');

class Gestao extends CI_Controller
{

    // ==================================================
    public function home()
    {
        //apresenta o menu inicial com a lista de produtos e respetivas quantidades
        if (!$this->session->has_userdata('id')) {
            redirect('geral/quadrologin');
        }

        $this->load->view('includes/header');
        $this->load->view('includes/cabecalho');

        $this->load->model('stock');
        $dados['produtos'] = $this->stock->tudo();
        $this->load->view('stock/inicio', $dados);

        $this->load->view('includes/rodape');
        $this->load->view('includes/footer');
    }

    // // ==================================================
    public function editar($id)
    {
        //editar a designação do produto
        $this->load->view('includes/header');
        $this->load->view('includes/cabecalho');

        $this->load->model('stock');
        $dados['produto'] = $this->stock->dados_produto($id)[0];
        $this->load->view('stock/editar', $dados);

        $this->load->view('includes/rodape');
        $this->load->view('includes/footer');
    }

    // // ==================================================
    public function editarGuardar($id)
    {
        //executa as operações de atualização dos dados do produto
        $this->load->model('stock');
        $resultado = $this->stock->editar_produto($id);

        //verifica se a operação foi concluída com sucesso
        if (!$resultado['resultado']) {
            $this->load->view('includes/header');
            $this->load->view('includes/cabecalho');

            $this->load->model('stock');
            $dados['produto'] = $this->stock->dados_produto($id)[0];
            $dados['mensagem'] = $resultado['mensagem'];
            $this->load->view('stock/editar', $dados);

            $this->load->view('includes/rodape');
            $this->load->view('includes/footer');
        } else {
            //volta a apresentar a página inicial com a tabela dos produtos
            $this->home();
        }
    }

    // ==================================================
    public function novo()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/cabecalho');

        //apresenta o formulário para adicionar um novo produto
        $this->load->view('stock/novo');

        $this->load->view('includes/rodape');
        $this->load->view('includes/footer');
    }

    // ==================================================
    public function novoGravar()
    {
        //grava novo produto na base de dados
        $this->load->model('stock');
        $resultado = $this->stock->novo_produto();

        if (!$resultado['resultado']) {
            $this->load->view('includes/header');
            $this->load->view('includes/cabecalho');

            $this->load->view('stock/novo', $resultado);

            $this->load->view('includes/rodape');
            $this->load->view('includes/footer');
        } else {
            $this->home();
        }
    }

    // ==================================================
    public function eliminar($id, $resposta = false)
    {
        //elimina o produto
        $this->load->model('stock');

        //antes de existir resposta
        if (!$resposta) {
            $dados['produto'] = $this->stock->dados_produto($id)[0];
            //apresenta a view com a questão
            $this->load->view('includes/header');
            $this->load->view('includes/cabecalho');

            $this->load->view('stock/eliminar', $dados);

            $this->load->view('includes/rodape');
            $this->load->view('includes/footer');
        } else {
            //quando é dada resposta
            $this->stock->eliminar($id);
            $this->home();
        }
    }

    // ==================================================
    public function adicionar($id)
    {

        //apresenta o quadro para adicionar
        if (is_null($this->input->post('count_quantidade'))) {
            //apresenta o quadro para adicionar quantidade
            $this->load->view('includes/header');
            $this->load->view('includes/cabecalho');

            //apresenta o formulário
            $this->load->model('stock');
            $dados['produto'] = $this->stock->dados_produto($id)[0];
            $this->load->view('stock/adicionar', $dados);

            $this->load->view('includes/rodape');
            $this->load->view('includes/footer');
        } else {

            //adiciona o valor                
            $this->load->model('stock');
            $this->stock->alterar_quantidade($id, $this->input->post('count_quantidade'));
            $this->home();
        }
    }

    // ==================================================
    public function subtrair($id)
    {

        //apresenta o quadro para subtrair
        if (is_null($this->input->post('count_quantidade'))) {
            //apresenta o quadro para subtrair quantidade
            $this->load->view('includes/header');
            $this->load->view('includes/cabecalho');

            //apresenta o formulário
            $this->load->model('stock');
            $dados['produto'] = $this->stock->dados_produto($id)[0];
            $this->load->view('stock/subtrair', $dados);

            $this->load->view('includes/rodape');
            $this->load->view('includes/footer');
        } else {

            //subtrai o valor                
            $this->load->model('stock');
            $this->stock->alterar_quantidade($id, -$this->input->post('count_quantidade'));
            $this->home();
        }
    }

    // ==================================================
    public function movimentos()
    {
        //apresenta a lista de movimentos
        $this->load->view('includes/header');
        $this->load->view('includes/cabecalho');

        $this->load->model('stock');
        $dados['movimentos'] = $this->stock->movimentos();
        $this->load->view('stock/movimentos', $dados);

        $this->load->view('includes/rodape');
        $this->load->view('includes/footer');
    }

    // ==================================================
    public function limparRegistoMovimentos()
    {
        //limpa a tabela de movimentos
        $this->load->model('stock');
        $this->stock->limpar_movimentos();
        $this->movimentos();
    }
}
