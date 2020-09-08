<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Stock extends CI_Model{
    
        // ==================================================
        public function tudo(){
            //vai buscar toda a informação dos produtos
            return $this->db->get('produtos')->result_array();
        }

        // ==================================================
        public function dados_produto($id){
            //retorna os dados do produto
            return $this->db->from('produtos')->where('id_produtos', $id)->get()->result_array();
        } 

        // ==================================================
        public function editar_produto($id){
            //executa as operações de edição dos dados do produto

            //verifica se já existe outro produto com o mesmo nome
            $designacao = $this->input->post('text_designacao');
            $resultado = $this->db->from('produtos')
                                  ->where('id_produtos<>', $id)
                                  ->where('designacao', $designacao)
                                  ->get();            

            if($resultado->num_rows()!=0){
                return array(
                                'resultado' => false,
                                'mensagem'  => 'Já existe outro produto com o mesmo nome.'
                            );
            }

            //atualiza os dados do produto
            $this->db->set('designacao', $designacao)
                     ->where('id_produtos', $id)
                     ->update('produtos');
            return array(
                'resultado' => true,
                'mensagem'  => ''
            );
        }

        // ==================================================
        public function novo_produto(){
            //grava um novo produto na base de dados, 
            //caso não existe um com a mesma designação

            $designacao = $this->input->post('text_designacao');

            //verifica se existe algum produto com a mesma designacao
            $resultado = $this->db->from('produtos')
                                  ->where('designacao', $designacao)
                                  ->get();
            if($resultado->num_rows()!=0){
                //já existe um produto com a mesma designacao
                return array(
                    'resultado' => false,
                    'mensagem'  => 'Já existe um produto com a mesma designação.'
                );
            }

            //grava o novo produto na base de dados
            $dados = array(
                'designacao' => $designacao,
                'quantidade' => 0
            );
            $this->db->insert('produtos', $dados);
            return array(
                'resultado' => true,
                'mensagem'  => ''
            );            
        }

        // ==================================================
        public function eliminar($id){
            //elimina o produto selecionado
            $this->db->delete('produtos', array('id_produtos' => $id));            
        }

        // ==================================================
        public function alterar_quantidade($id, $quantidade){
            //altera a quantidade de produtos e regista o movimento

            //altera a quantidade do produto
            $this->db->where('id_produtos', $id)
                     ->set('quantidade', 'quantidade + '.$quantidade, FALSE)
                     ->update('produtos');

            //adiciona nova entrada em 'movimentos'
            $dados = array(
                'id_produtos'    => $id,
                'quantidade'    => $quantidade,
                'data_hora'     => date('Y-m-d H:i:s')
            );
            $this->db->insert('movimentos', $dados);
        }    
        
        // ==================================================
        public function movimentos(){
            //retorna toda a tabela de movimentos
            $resultados = $this->db->select('m.*, p.designacao designacao, p.quantidade temp')
                                   ->from('movimentos as m')
                                   ->join('produtos as p', 'm.id_produtos = p.id_produtos', 'left')
                                   ->get();
            return $resultados->result_array();
        }

        // ==================================================
        public function limpar_movimentos(){
            //limpa os registos de movimentos
            $this->db->empty_table('movimentos');
            $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
        }
    }
?>