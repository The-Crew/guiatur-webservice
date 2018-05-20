<?php

class Estado extends JsonGetter {

    private
            $Uf,
            $Nome;

    public static function fromJson($decoded_json) {
        $obj = new Estado();
        foreach ($decoded_json as $key=>$value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }
    
    public function getUf() {
        return $this->Uf;
    }

    public function getNome() {
        return $this->Nome;
    }
    
    public function setUf($uf) {
        $this->Uf = $uf;
    }
    
    public function setNome($nome) {
        $this->Nome = $nome;
    }

}
