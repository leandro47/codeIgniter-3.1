<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Usuarios extends CI_Model{
    
        // ==================================================
        public function verificar_login(){
            //verifica se os dados introduzidos no quadro de login são válidos

            //--------------------------------------------
            //MÉTODO SEM QUERY BUILDER
            // $parametros = [
            //     $this->input->post('text_usuario'),
            //     md5($this->input->post('text_senha'))
            // ];
            // $resultado = $this->db->query('SELECT * FROM usuarios WHERE usuario = ? AND senha = ?', $parametros);
            //--------------------------------------------

            //--------------------------------------------
            //MÉTODO COM QUERY BUILDER
            $this->db->from('usuarios');
            $this->db->where('usuario', $this->input->post('text_usuario'));
            $this->db->where('senha', md5($this->input->post('text_senha')));            
            $resultado = $this->db->get();


            $resultado = $this->db->from('usuarios')
                                  ->where('usuario', $this->input->post('text_usuario'))
                                  ->where('senha', md5($this->input->post('text_senha')))
                                  ->get();            


            //--------------------------------------------

            if($resultado->num_rows()==0){
                //login inválido
                return false;
            } else {
                //login válido

                //abre a sessão com os dados do usuario
                $dados_usuario = $resultado->row();
                $this->session->set_userdata('id',$dados_usuario->id);
                $this->session->set_userdata('usuario',$dados_usuario->usuario);                
                return true;
            }
        }    
    }
?>