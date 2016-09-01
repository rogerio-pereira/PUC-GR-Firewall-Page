<?php
    /**
      * controladorArquivos.php
      * Classe de Controle controladorArquivos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorArquivos
    {
        /*
         *    Variaveis
         */
        private $file;
        private $filename;


        /*
         * Métodos
         */
        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct($file, $modo)
        {
            $this->filename = $file;
            $this->file     = fopen($file, $modo);
        }

        /**
         * Método Destrutor
         *
         * @access private
         * @return void
         */
        public function __destruct()
        {
            fclose($this->file);
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
          * Método escrever
          * Escreve o conteudo em um arquivo
          * 
          * @access public
          * @param  string $string  Conteudo que será escrito no arquivo
          * @return int             Número de bytes escritos ou FALSE em caso de falha
          */
        public function escrever($string)
        {
            return fwrite($this->file, $string);
        }

        /**
          * Método ler
          * Le o conteudo em um arquivo
          * 
          * @access public
          * @return string  Conteúdo do arquivo
          */
        public function ler()
        {
            /*$conteudo = array();
            while(!feof($this->file))
            {
                $conteudo[] = fgets($this->file);
            }

            return $conteudo;*/

            if(filesize($this->filename) > 0)
                return fread($this->file, filesize($this->filename));
            else 
                return NULL;
        }
    }
?>