<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo 'Lista na view';
//$this->produtos = ['item 1', 'item 2', 'último item'];
foreach($this->produtos as $item) {
    echo '<br>';
    echo '<a href=/conteudo?idProduto='.$item['idProduto'].'>'.$item['nome'].'</a>';
}
    