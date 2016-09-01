<?php
    /**
      * modelRegras.php
      * Classe de Controle modelRegras
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class modelRegras
    {
        /*
         *    Variaveis
         */
        private $operacao;
        private $forward;
        private $input;
        private $output;

        private $controladorArquivo;

        /*
         * Métodos
         */
        /**
         * Método Construtor
         *
         * @access private
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
          * Método __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        /**
          * Método salvar
          * Salva arquivo de Firewall
          * 
          * @access public
          * @return boolean Status da Operação
          */
        public function salvarRegras()
        {
            $this->controladorArquivo = new controladorArquivos('../app.files/firewall.txt', 'w');

            $string = $this->operacao."\n";

            //TABELA | IP | PROTOCOLO | AÇÂO

            if(isset($this->forward))
            {
                foreach ($this->forward as $forward) {
                    $string .= 'FORWARD'.' | '.$forward[0].' | '.$forward[1].' | '.$forward[2].' | '.$forward[3].' | '.$forward[4]."\n";
                }
            }
            
            if(isset($this->input))
            {
                foreach ($this->input as $input) {
                    $string .= 'INPUT'.' | '.$input[0].' | '.$input[1].' | '.$input[2].' | '.$input[3].' | '.$input[4]."\n";
                }
            }
            
            if(isset($this->output))
            {
                foreach ($this->output as $output) {
                    $string .= 'OUTPUT'.' | '.$output[0].' | '.$output[1].' | '.$output[2].' | '.$output[3].' | '.$output[4]."\n";
                }
            }

            echo $this->controladorArquivo->escrever($string);

            unset($this->controladorArquivo);
        }
    }
?>