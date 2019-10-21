
<?php  
    include_once("classes/Usuario.class.php");
    session_start();
    $usuario = new Usuario();
    if (   isset($_POST['email'])  ) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$usuario->valida($email, $senha);
		if ($usuario->id > 0) {
		  $_SESSION['usuario'] = $usuario->id;
		} else {
		  echo "<script>".
		       "alert('Usuário ou senha/inválidos!')".
			   "</script>";	
		}
    }
	
	/*04/10/2019*/
	if (isset($_SESSION['usuario'])) {
		$usuario->get($_SESSION['usuario']);
	}
	/* fim 04/10/2019*/
	
	
	
	
?>





<html lang="ptbr">
   <head>
      <meta charset="utf8">
	  <title>Loja Etim</title>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
	  <link href="css/index.css" rel="stylesheet"> <!-- 13/09/2019 -->
   </head>
   <body>
        
		<?php  include("menu.php"); ?> 
        
       
	    <div class="container">
		<?php if ($usuario->id==0) {  ?>
		
		
		  <div class="row"> 
				<div id="divlogin" class="col s12 m6 offset-m3 light-blue darken-3 z-depth-3"> 
				   <div class="card"> 
				     <div class="card-image"> 
					     <img src="img/logo.png">
					 </div>
				     <div class="card-content">  
				   
					 <form id="formlogin"  method="POST">
						<div class="input-field"> 
							 <input type="text" id="email" name="email" placeholder="Digite seu email">
							 <label for="email">Email</label>
						</div>
						<div class="input-field">  
							 <input type="password" id="senha" name="senha">
							 <label for="senha">Senha</label>
						</div>

						<div class="input-field  center">  
						   <input type="submit" class="btn " value="Validar">
						</div>
					 </form>
					</div>
				   </div> 
				</div>
		  </div> 
		<?php } ?>
			
		</div>
	     
	   
   
   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   </body>
</html>