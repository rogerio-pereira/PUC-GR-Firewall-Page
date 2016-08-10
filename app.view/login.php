<?php
	/**
	  * login.php
	  * Classe login
	  *
	  * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
	  * @version 1.0
	  * @access  public
	  */
	class login
	{
		/*
		 * Variaveis
		 */

		/*
		 * Método construtor
		 */
		public function __construct()
		{
			new TSession(1);
		}

		/*
		 * Método show
		 * Exibe as informa?es na tela
		 */
		public function show()
		{
			?>
				<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
					<head>
						<!--CSS-->
	                    <?php include_once 'css/css.php'; ?>
	                    
	                    <!--JS-->
	                    <?php include_once 'js/jsLib.php'; ?>
						
						<!--JavaScript-->
						<script type="text/javascript" src="app.view/js/login.min.js"></script>
					</head>
					<body>
						<div class='2u -5u'>
							<div class='contentLogin'>
								<form 
									class="loginForm"
									name="login"
									id="login"
									method="post"
								>
									<h1 class='center'>Login Firewall</h1>
									<input 
										type='email' 
										id='email' 
										name='email'  
										placeholder='E-mail'
										required
									/><br>
									<input 
										type='password' 
										id='senha' 
										name='senha' 
										required
										placeholder='Senha'
									><br />
									<input 
										name='botaoLogin' 
										type='submit' 
										id='botaoLogin' 
										class='center'
										value='Login' 
										onclick='validaLogin()'
									/>
								</form>
							</div>
						</div>
					</body>
				</html>

				<script type="text/javascript" src="/app.view/js/jsInit.min.js"></script>
			<?php
		}
	}
?>