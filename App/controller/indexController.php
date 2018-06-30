<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
  
include 'App//model//produtos.php';
/**
 * Description of indexController
 *
 * @author alfamidia
 */
class indexController {
    
    protected $view;
    public $produtos;
    public $detalhe_produto;
    
    //put your code here
    public function index() {
        $this->render('index.php','template.php');
    }
    public function lista() {
        $modelProdutos = new \App\model\produtos();
        $this->produtos = $modelProdutos->RetornaProdutos();
        $this->render('lista.php','template.php');
    }
    
    
    public function conteudo() {
        $modelProdutos = new \App\model\produtos();
        $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
        $this->render('conteudo.php','template.php');
    }
    
    
    
    
    public function content() {
        include $this->view;
    }
    
    public function render($view, $template) {
        $this->view = 'App//view//www//' . $view;
        include 'App//view//' . $template;
    }
    
}
