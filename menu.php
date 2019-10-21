        <nav class="light-blue darken-4">
	       <a href="#!" class="brand-logo">LojaEtim</a>	
		   <ul class="right ">
		   
		      <li><a href="#!">Inicio</a></li>
              <?php if ($usuario->id==0) {  ?>
				  <li><a href="#!">Entrar</a></li>
				  <li><a href="usuario_page.php">Registrar-se</a></li>
			  <?php } else { ?>	  
				  <li><a href="#!"><i class="material-icons left">
				  account_circle</i> <?php echo $usuario->nome;  ?></a></li>
			  <?php }  ?>	  
			  
		   </ul>
		</nav>
   
   