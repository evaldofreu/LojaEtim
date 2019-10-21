<?php
   include("classes/Usuario.class.php");
   $usuario = new Usuario(); // 11/10
   
   
   if (isset($_POST["nome"])) {
      $nome  = $_POST["nome"]; 	  
      $email = $_POST["email"]; 	   
      $senha = $_POST["senha"]; 	   	  
      $conf  = $_POST["confsenha"]; 	   	  
	  if ( strlen($nome) <3 ) {
		  echo "<script>alert('Nome do Usuário deve conter 3 caracteres ou mais.')</script>";
	  } else if ( strpos($email,'@') < 0 && strlen($email) < 3 ) {
		  echo "<script>alert('Dever ser informado um email válido!')</script>";
	  } else if ( strlen($senha) < 3 ) {
		  echo "<script>alert('A senha deve ter mais do que 3 caracteres!')</script>";
	  } else if ( $senha != $conf ) {
		  echo "<script>alert('As senhas não conferem!')</script>";
	  } else { // caso os dados estiverem corretos
		$novo = new Usuario(); // um novo usuário será criado com os dados informados //11/10
		$novo->nome  = $nome; //11/10 
		$novo->email = $email; //11/10
		$novo->senha = $senha; //11/10
		$novo->salvar();  // e através do método salvar da classe Usuario ele  11/10
		                     // será salvo no banco de dados.
		header("Location:index.php"); // alterna para a página index.php
	  }
	  
   } 	   

?>




<html lang="ptbr">
   <head>
      <meta charset="utf8">
	  <title>Loja Etim - Cadastro</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
   </head>
   <body>
        
		<?php  include("menu.php"); ?> 
        <div class="container">
		     <form method="POST">
					<div class="input-field">
					   <input type="text" name="nome" id="nome">
					   <label for="nome">Nome</label>
					</div>
				
					<div class="input-field">
					   <input type="email" name="email" id="email">
					   <label for="email">Email</label>
					</div>
				
					<div class="input-field">
					   <input type="password" name="senha" id="senha">
					   <label for="senha">senha</label>
					</div>
				
					<div class="input-field">
					   <input type="password" name="confsenha" id="confsenha">
					   <label for="confsenha">Digite a senha novamente</label>
					</div>
					
					<center>  <input type="submit" value="registrar" class="btn btn-large blue"></center>
					
			 </form>
		</div>
		
       
   
   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   </body>
</html>