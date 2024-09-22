<?php

namespace App\Lib;

use Exception;

class Erro
{
    private $message;
    private $code;
    private $file;
    private $line;

    public function __construct($objetoException = Exception::class)
    {
        $this->code     = $objetoException->getCode();
        $this->message  = $objetoException->getMessage();
        $this->file     = $objetoException->getFile();
        $this->line     = $objetoException->getLine();

    }

    public function render()
    {
        $varMessage = $this->message;
        $varFile    = $this->file;
        $varLine       = $this->line;

        if(file_exists(PATH . "/App/Views/error/".$this->code.".php")){
            require_once PATH . "/App/Views/error/".$this->code.".php";
        }else{
            require_once PATH . "/App/Views/error/500.php";
        }
        exit;
    }
}