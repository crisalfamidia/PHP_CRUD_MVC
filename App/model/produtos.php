<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\model;

/**
 * Description of produtos
 *
 * @author alfamidia
 */
class produtos {
    private $produtos;
    private $detalhe_produto;

    public function LerProdutos() {
//        $this->produtos = ['primeiro item vindo do model', 'segundo item vindo do model', 'terceiro item vindo do model'];

        try {
           $PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } catch (\PDOException $exc) {
            echo "erro na conexão<br>";
            echo $exc->getMessage();
            return;
        }
        
        $sql = "SELECT idProduto, nome FROM produtos";
        $i = 0;
        foreach($PDO->query($sql) as $row){
            $this->produtos[$i]['nome'] = $row['nome'];
            $this->produtos[$i]['idProduto'] = $row['idProduto'];
            $i++;
            
        }
    }
    
        public function InserirProduto() {
        try {
           $PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } catch (\PDOException $exc) {
            echo "erro na conexão<br>";
            echo $exc->getMessage();
            return;
        }
        
        for ($num=3; $num<=1000; $num++){
        $sql = "INSERT INTO `produtos` (`idProduto`, `nome`, `descricao`) VALUES ('{$num}', 'Produto {$num}', 'Teste {$num}');";
        $retorno = $PDO->prepare($sql);
        $retorno->execute();
        }
        
    }   
    
    public function LerDetalheProduto($idProduto) {
        try {
           $PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } catch (\PDOException $exc) {
            echo "erro na conexão<br>";
            echo $exc->getMessage();
            return;
        }
        
        $sql = "SELECT nome, descricao FROM produtos WHERE idProduto= ?";
        $retorno = $PDO->prepare($sql);
        $retorno->bindParam(1,$idProduto);
        $retorno->execute();
        $resultado = $retorno->fetch();
        $this->detalhe_produto['nome'] = $resultado['nome'];
        $this->detalhe_produto['descricao'] = $resultado['descricao'];
        
        return $this->detalhe_produto;
        
    }
    
    public function RetornaProdutos() {
        $this->LerProdutos();
        return $this->produtos;
    }
}
