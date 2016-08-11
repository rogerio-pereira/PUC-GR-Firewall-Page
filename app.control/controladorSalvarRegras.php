<?php
    /**
    * Funcao Autoload
    * Carrega a classe quando for instanciada
    * 
    * @param  $classe     Classe a ser carregada
    * @return void
    */
    //Autoload
    function __autoload($classe)
    {
        $pastas = array('../app.widgets', '../app.ado', '../app.config', '../app.model', '../app.control','../app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.php"))
            {
                include_once "{$pasta}/{$classe}.php";
            }
        }
    }

    /**
      * controladorSalvarRegras.php
      * Controlador para salvar as regras do Firewall
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorSalvarRegras
    {
        private $operacao;
        private $forward;
        private $input;
        private $output;

        private $modelRegras;

        /**
         * Método Construtor
         *
         * @access public
         * @return void
         */
        public function __construct($operacao = NULL, $forward = NULL, $input = NULL, $output = NULL)
        {
            $this->operacao = $operacao;
            $this->forward  = $forward;
            $this->input    = $input;
            $this->output   = $output;
        }

        /**
         * Método salvaRegras
         *
         * @access public
         * @return boolean
         */
        public function salvaRegras()
        {
            $this->modelRegras = (new modelRegras(
                                                    $this->operacao,
                                                    $this->forward,
                                                    $this->input,
                                                    $this->output
                                                ))->salvarRegras();
        }
    }

    error_reporting(E_WARNING);
    $controlador = (new ControladorSalvarRegras(
                                                $_POST['operacao'], 
                                                $_POST['forward'], 
                                                $_POST['input'], 
                                                $_POST['output']
                                            ))->salvaRegras();
?>