<?php

require_once "Estado.php";

class Municipio extends JsonGetter {

    private
            $Id,
            $Estado,
            $Nome;

    public function __construct() {
        $this->Estado = new Estado();
    }
    
    public static function fromJson($decoded_json) {
        $obj = new Municipio();
        foreach ($decoded_json as $key=>$value) {
            switch ($key) {
                case 'Estado':
                    $obj->{$key} = Estado::fromJson($value);
                    break;
                default:
                    $obj->{$key} = $value;
            }
        }
        return $obj;
    }

    public function getId() {
        return $this->Id;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }



}
