<?php
class nomes
{
    //propriedades
    private $nome;
    private $apelido;

    //Metodos
    public function setNome($n)
    {
        $this->nome = $n;
    }

    public function setApelido($n)
    {
        $this->apelido = $n;
    }

    public function nomeCompleto(){
        return $this-> nome.' '. $this->apelido;
    }
}
