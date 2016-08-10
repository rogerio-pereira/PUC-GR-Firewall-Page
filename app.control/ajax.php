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
    * ajax.php
    * Destino de todos os formularios
    *
    * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
    * @version 1.0   
    */
    //error_reporting(E_WARNING);

    //Obtem informação do que sera feito através do campo action
    //$request = $_POST['request'];

    //if($request == 'salvaRegras')
    //{
        
        var_dump($_POST['forward']);
        //echo 'teste';
    //}
?>