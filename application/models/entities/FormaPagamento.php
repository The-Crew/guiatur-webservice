<?php

class FormaPagamento extends JsonGetter {

    private
            $Id,
            $Descricao;
    
    public static function fromJson($decoded_json) {
        $obj = new FormaPagamento();
        foreach ($decoded_json as $key=>$value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }
    
    public function getId() {
        return $this->Id;
    }

    public function getDescricao() {
        return $this->Descricao;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }



}
