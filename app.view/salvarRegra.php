<?php

	/**
      * home.php
      * Classe salvarRegra
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
	class salvarRegra
	{
		/*
		 * Vari?eis
		 */


		/**
		 * Método construtor
		 * Verifica se esta logado
		 * 
		 * @access public
		 * @return void
		 */
		public function __construct()
		{
			
		}


		/**
		 * Método show
		 * Exibe as informa?es da p?ina
		 * 
		 * @access public
		 */
		public function show()
		{
			?>
				<form
					name='firewall'
					id='firewall'
					action=''
					method='post'
				>
					<h1 class='center'>
						Regras Firewall
					</h1>
					<hr>

					<h2 class='center'>
						Operação
					</h2>

					<div class='row center'>
						<div class='2u -4u'>
							<input type='radio' name='operacao' id='whitelist' value='whitelist'> 
							<label for='whitelist'>Whitelist</label>
						</div>

						<div class='1u'>
							<input type='radio' name='operacao' id='blacklist' value='blacklist'>
							<label for='blacklist'>Blacklist</label>
						</div>
					</div>

					<hr>
					<h2 class='center'>
						Tabela FORWARD
					</h2>

					<input 
						type='button' 
						id='adicionarRegraForward' 
						class='adicionarRegra center' 
						onclick="adicionaRegra('Forward')"
						value='Adicionar'
					>
					<input type='hidden' name='numeroCamposForward' id='numeroCamposForward' value='0'>

					<div id='camposForward'>
					</div>

					<hr>
					<h2 class='center'>
						Tabela INPUT
					</h2>

					<input 
						type='button' 
						id='adicionarRegraInput' 
						class='adicionarRegra center' 
						onclick="adicionaRegra('Input')"
						value='Adicionar'
					>
					<input type='hidden' name='numeroCamposInput' id='numeroCamposInput' value='0'>

					<div id='camposInput'>
					</div>

					<hr>
					<h2 class='center'>
						Tabela OUTPUT
					</h2>

					<input 
						type='button' 
						id='adicionarRegraOutput' 
						class='adicionarRegra center' 
						onclick="adicionaRegra('Output')"
						value='Adicionar'
					>
					<input type='hidden' name='numeroCamposOutput' id='numeroCamposOutput' value='0'>

					<div id='camposOutput'>
					</div>

					<hr>
					<input type='submit' class='center' value='Salvar'>
				</form>

				<script type="text/javascript" src="/app.view/js/jsMascaras.min.js"></script>
				<script type="text/javascript" src="/app.view/js/jsSalvarRegras.min.js"></script>
			<?php
		}
	}
?>