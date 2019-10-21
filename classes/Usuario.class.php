<?php
 include 'conexao.php';

 class Usuario {
	 public $email;
	 public $id;
	 public $nome;
	 public $senha;
	
     function get($id) {
          //cria objeto conexao
          $conexao = new Conexao();
          //obtem um pdo conectado
          $pdo = $conexao->conectar(); 
          //analisa a consulta sql
          $st = $pdo->prepare("select * from usuario where id like :id");
		  $st->bindParam(':id',$id);
          //executa a consulta
          $st->execute();
          //armazena o resultado da consulta em um array
          $result = $st->fetchAll();
          //imprime o array
          //print_r($result);
		  //analisa o vetor de resultados
		  $this->id = 0;
		  foreach ($result as $registro) {
		     foreach ($registro as $campo => $valor) {
			   if ($campo!="senha") {	 
		          $this->$campo = $valor;
			   }
             }
          }
		  
	 }		 
     	
	function salvar() {
			  //cria objeto conexao
			  $conexao = new Conexao();
			  //obtem um pdo conectado
			  $pdo = $conexao->conectar(); 
			  //analisa a consulta sql
			  $st = $pdo->prepare(
			  "insert into usuario (nome, email, senha) 
			  values (:nome, :email, :senha)");
			  $st->bindParam(':nome',$this->nome);
			  $st->bindParam(':email',$this->email);
			  $st->bindParam(':senha',$this->senha);
			  //executa a inserção
			  return $st->execute();
			  
		 }		 
	function  valida($email, $senha) {
          $conexao = new Conexao();
          $pdo = $conexao->conectar(); 
          $st = $pdo->prepare("select * from usuario where email like :email and senha like :senha");
		  $st->bindValue(':email',$email);
		  $st->bindValue(':senha',$senha);
          $st->execute();
          $result = $st->fetchAll();
		  $this->id = 0;
		  foreach ($result as $registro) {
		     foreach ($registro as $campo => $valor) {
		       $this->$campo = $valor;
             }
          }
	}
	
	
	
}


?>
